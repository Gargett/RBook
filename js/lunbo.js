window.onload= function(){
			dire = 1;
	    	count = 0;
			obj = $("#shang #lunbo_but li");
			obj[0].setAttribute("class","cur");
			var x = setInterval("disp();", 5000);
			$("#shang #lunbo_but li").click(function() {
				disp($(this).children("span").html() - 1);
			}).stop();
		}
	   
		function disp(page_) {

			if (page_ <= 3) {
				obj.removeClass("cur");
				obj[page_].setAttribute("class","cur");
				$("#lunbo").css({'-ms-transform':'translate(-'+page_*1000+'px)',
							 '-moz-transform':'translate(-'+page_*1000+'px)',
							 '-webkit-transform':'translate(-'+page_*1000+'px)'});
				count = page_;
			} else {
			count = count % 4;
			obj.removeClass("cur");
			obj[count].setAttribute("class","cur");
			$("#lunbo").css({'-ms-transform':'translate(-'+count*1000+'px)',
							 '-moz-transform':'translate(-'+count*1000+'px)',
							 '-webkit-transform':'translate(-'+count*1000+'px)'});
			count++;
			}
		}


var module = (function(){
	var _num = 4;
	var count = 0;
	var obj = $("#shang #lunbo_but li");
	var obj[0].setAttribute("class","cur");
	var disp = function() {
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
	var start_ = function() {
		var x = setInterval("disp();", 5000);
		$("#shang #lunbo_but li").click(function() {
				disp($(this).children("span").html() - 1);
			}).stop();
	}
	return {
		start_:start_;
	};
})();
module.m1.call(this, 2);
module.m2.call();


var module = (function(){
	var _count = 0;
	var m1 = function() {
		_count = 1;
	}
	var m2 = function(){
		alert(_count);
	}
	return {
		m1:m1,
		m2:m2
	};
})();
module.m1.call();
module.m2.call();