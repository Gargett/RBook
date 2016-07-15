window.onload= function(){
	var module = (function(){
	var _num = 4;
	var count = 0;
	var obj = $("#shang #lunbo_but li");
	obj[0].setAttribute("class","cur");
	var disp = function(page_) {
		if (page_ < _num) {
				obj.removeClass("cur");
				obj[page_].setAttribute("class","cur");
				$("#lunbo").css({'-ms-transform':'translate(-'+page_*1000+'px)',
							 '-moz-transform':'translate(-'+page_*1000+'px)',
							 '-webkit-transform':'translate(-'+page_*1000+'px)'});
				count = page_;
			} else {
			count = count % _num;
			obj.removeClass("cur");
			obj[count].setAttribute("class","cur");
			$("#lunbo").css({'-ms-transform':'translate(-'+count*1000+'px)',
							 '-moz-transform':'translate(-'+count*1000+'px)',
							 '-webkit-transform':'translate(-'+count*1000+'px)'});
			count++;
		}
	}
	var ale = function(){
		alert("asdf");
	}
	var start_ = function() {
		var x = setInterval("ale();", 5000);
		$("#shang #lunbo_but li").click(function() {
				disp($(this).children("span").html() - 1);
			}).stop();
	}
	return {
		start_:start_
	};
})();
  module.start_.call();
}



