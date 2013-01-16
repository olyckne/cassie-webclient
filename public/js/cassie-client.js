function Cassie_client(options) {
	this.url = options.url || "ws://localhost:8080";
	this.outputElem = $(options.outputElem) || $(".output");
	this.wrapperElem = options.wrapperElem || "<p/>";
	this.form = options.form || "#cassie_form";
	this.formInput = options.formInput || "#cassie_form_input";
	this.newMessageClass = options.newMessageClass || "cassie_new_message";
	this.socket = options.socket || null;
	this.scrollIfAtBottom = options.scrollIfAtBottom || true;
	this.isAtBottom = false;
	this.showTimestamp = options.showTimestamp || true;
}

Cassie_client.prototype = {
	
	init: function() {
		var _this = this;
		if(!this.socket) {
			this.socket = io.connect(this.url);

			console.log(this.socket);

			this.socket.on("connect", function() {
				_this.outputLog("Connected");
			});

			this.socket.on("message", function(msg) {
				_this.outputLog(msg);
			});
		}

		this.bindForm();
		this.bindScroll();
		this.outputElem.css("position", "relative");
	},

	isImage: function(str) {
		return typeof str === "string" && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp)((\?|#).*)?$)/i);
	},

	outputLog: function(msg) {
		console.log(msg);
		var elem = $(this.wrapperElem),
			img = null,
			_this = this;

		elem.addClass("cassie_new_message").css({"background-color": "yellow"});
		this.outputElem.append(elem);

		if(this.isImage(msg)) {
			img = $("<img/>").attr("src", msg).appendTo(elem).load( function() {
				console.log("done loading");
				console.log("height here: "+$(this).height());
				if(_this.scrollIfAtBottom) _this.scrollOutput(this);
			});
		}
		else {
			elem.html(msg);
			if(this.scrollIfAtBottom) this.scrollOutput(elem);
		}
		
		elem.html($("<span/>").html(new Date().toLocaleTimeString()+": ").html()+elem.html());
		console.log("done");
	},

	bindForm: function() {
		var _this = this;
		$(this.form).on("submit", function(evt) {
			var msg = $(_this.formInput).val();

			_this.send(msg);
			evt.preventDefault();
		});
	},

	bindScroll: function() {
		var _this = this;
		this.outputElem.on("scroll", function(evt) {
			var outputTop = _this.outputElem.scrollTop(),
				outputBottom = outputTop+_this.outputElem.height();

			_this.isAtBottom = (outputBottom !== _this.outputElem[0].scrollHeight) ? false : true;

			$("."+_this.newMessageClass).each( function() {
				var $this = $(this),
					elemTop = $this.position().top,
					elemBottom = elemTop+$this.height();

				if(elemTop <= 0 || outputBottom === _this.outputElem[0].scrollHeight) {
					$this.removeClass(_this.newMessageClass).css("background-color", "");
				}
			});
		});
	},

	send: function(msg) {
		if(this.socket && this.socket.socket.connected) {
			console.log("sending: " + msg);
			this.socket.send(msg);
			$(this.formInput).val("");
		}
	},

	scrollOutput: function(elem) {
		var position = this.outputElem.scrollTop(),
			bottom = this.outputElem[0].scrollHeight;

		console.log(this.isAtBottom);

		if(this.isAtBottom)
			this.outputElem.scrollTop(bottom);
	}

};
