// JavaScript Document
/**
 * @classDescription 妯℃嫙Marquee锛屾棤闂存柇婊氩姩鍐呭
 * @DOM
 *  	<div id="marquee">
 *  		<ul>
 *   			<li></li>
 *   			<li></li>
 *  		</ul>
 *  	</div>
 * @CSS
 *  	#marquee {width:200px;height:50px;overflow:hidden;}
 * @Usage
 *  	$('#marquee').kxbdMarquee(options);
 * @options
 *		isEqual:true,//镓€链夋粴锷ㄧ殑鍏幂礌闀垮鏄惁鐩哥瓑,true,false
 *  	loop: 0,//寰幆婊氩姩娆℃暟锛?镞舵棤闄?
 *		direction: 'left',//婊氩姩鏂瑰悜锛?left','right','up','down'
 *		scrollAmount:1,//姝ラ昵
 *		scrollDelay:20//镞堕昵
 */
(function($){

	$.fn.kxbdMarquee = function(options){
		var opts = $.extend({},$.fn.kxbdMarquee.defaults, options);
		
		return this.each(function(){
			var $marquee = $(this);//婊氩姩鍏幂礌瀹瑰櫒
			var _scrollObj = $marquee.get(0);//婊氩姩鍏幂礌瀹瑰櫒DOM
			var scrollW = $marquee.width();//婊氩姩鍏幂礌瀹瑰櫒镄勫搴?
			var scrollH = $marquee.height();//婊氩姩鍏幂礌瀹瑰櫒镄勯佩搴?
			var $element = $marquee.children(); //婊氩姩鍏幂礌
			var $kids = $element.children();//婊氩姩瀛愬厓绱?
			var scrollSize=0;//婊氩姩鍏幂礌灏哄
			var _type = (opts.direction == 'left' || opts.direction == 'right') ? 1:0;//婊氩姩绫诲瀷锛?宸﹀彸锛?涓娄笅
			
			//阒叉婊氩姩瀛愬厓绱犳瘮婊氩姩鍏幂礌瀹借€屽彇涓嶅埌瀹为台婊氩姩瀛愬厓绱犲搴?
			$element.css(_type?'width':'height',10000);
			//銮峰彇婊氩姩鍏幂礌镄勫昂瀵?
			if (opts.isEqual) {
				scrollSize = $kids[_type?'outerWidth':'outerHeight']() * $kids.length;
			}else{
				$kids.each(function(){
					scrollSize += $(this)[_type?'outerWidth':'outerHeight']();
				});
			}
			//婊氩姩鍏幂礌镐诲昂瀵稿皬浜庡鍣ㄥ昂瀵革紝涓嶆粴锷?
			if (scrollSize<(_type?scrollW:scrollH)) return; 
			//鍏嬮殕婊氩姩瀛愬厓绱犲皢鍏舵彃鍏ュ埌婊氩姩鍏幂礌鍚庯紝骞惰瀹氭粴锷ㄥ厓绱犲搴?
			$element.append($kids.clone()).css(_type?'width':'height',scrollSize*2);
			
			var numMoved = 0;
			function scrollFunc(){
				var _dir = (opts.direction == 'left' || opts.direction == 'right') ? 'scrollLeft':'scrollTop';
				if (opts.loop > 0) {
					numMoved+=opts.scrollAmount;
					if(numMoved>scrollSize*opts.loop){
						_scrollObj[_dir] = 0;
						return clearInterval(moveId);
					} 
				}

				if(opts.direction == 'left' || opts.direction == 'up'){
					var newPos = _scrollObj[_dir] + opts.scrollAmount;
					if(newPos>=scrollSize){
						newPos -= scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}else{
					var newPos = _scrollObj[_dir] - opts.scrollAmount;
					if(newPos<=0){
						newPos += scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}
			}
			//婊氩姩寮€濮?
			var moveId = setInterval(scrollFunc, opts.scrollDelay);
			//榧犳爣鍒掕绷锅沧婊氩姩
			$marquee.hover(
				function(){
					clearInterval(moveId);
				},
				function(){
					clearInterval(moveId);
					moveId = setInterval(scrollFunc, opts.scrollDelay);
				}
			);
			
		});
	};
	$.fn.kxbdMarquee.defaults = {
		isEqual:true,//镓€链夋粴锷ㄧ殑鍏幂礌闀垮鏄惁鐩哥瓑,true,false
		loop: 0,//寰幆婊氩姩娆℃暟锛?镞舵棤闄?
		direction: 'left',//婊氩姩鏂瑰悜锛?left','right','up','down'
		scrollAmount:1,//姝ラ昵
		scrollDelay:20//镞堕昵

	};
	$.fn.kxbdMarquee.setDefaults = function(settings) {
		$.extend( $.fn.kxbdMarquee.defaults, settings );
	};
})(jQuery);