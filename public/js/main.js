$(function() {
	'use strict';
	var url = "ws://localhost:3030",
		output = ".output",
		cassie_client;


		cassie_client = new Cassie_client({
			url: url, outputElem : output, 
			form: "#chatForm", formInput: "#chatmessage"}
		);

		console.log(cassie_client);

		cassie_client.init();

});