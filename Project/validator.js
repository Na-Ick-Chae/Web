"use strict"
$(document).ready(function () {
	$('#html-svg').click(function () {
		// var assignNo = $('#aid').attr('aid');
		// var title = [];
		var title = "http://localhost/Project/helloWorld.html";
		$.ajax({
			url: 'http://localhost:8888',
			method: 'get',
			data : {
				// doc : title[assignNo],
				doc : title,
				out : "json"
			}
		}).done(function (msg) {
			var msgs = msg.messages;
			for (var i = 0; i < msgs.length; i++) {
				if (msgs[i].type === "error") {
					$('#error').append(msgs[i].message);
				}
			}
			console.log(msg);
		});
	});
});