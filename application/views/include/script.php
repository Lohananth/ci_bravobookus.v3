<script type="text/javascript" src="/js/js.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        function progressBar(e){$elem=e,buildProgressBar(),start()}function buildProgressBar(){$progressBar=$("<div>",{id:"progressBar"}),$bar=$("<div>",{id:"bar"}),$progressBar.append($bar).prependTo($elem)}function start(){percentTime=0,isPause=!1,tick=setInterval(interval,10)}function interval(){isPause===!1&&(percentTime+=1/time,$bar.css({width:percentTime+"%"}),percentTime>=100&&$elem.trigger("owl.next"))}function pauseOnDragging(){isPause=!0}function moved(){clearTimeout(tick),start()}(new WOW).init(),jQuery(document).ready(function(e){e(".scroll").click(function(t){t.preventDefault(),e("html,body").animate({scrollTop:e(this.hash).offset().top},900)})}),$("#find-ticket").click(function(){""==$("#directionfrom span.text").text()&&""==$("#directionto span.text").text()?toastr.error("Please chose one Origin and description, this field do not empty like this.","Origin and Destination empty !"):""==$("#directionfrom span.text").text()?toastr.warning("Please chose one origin, this field do not empty like this.","Origin empty !"):""==$("#directionto span.text").text()?toastr.warning("Please chose one Destination, this field do not empty like this.","Destination empty !"):""!==$("#directionfrom span.text").text()&&""!==$("#directionto span.text").text()&&$(this).attr({type:"submit"}),toastr.options={closeButton:!0,debug:!1,newestOnTop:!1,progressBar:!0,positionClass:"toast-top-right",preventDuplicates:!1,onclick:null,showDuration:"300",hideDuration:"1000",timeOut:"5000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"}}),$().UItoTop({easingType:"easeOutQuart"}),$(function(){$("#datepicker").datepicker({minDate:0,dateFormat:"yy-mm-dd"}),$('[data-toggle="tooltip"]').tooltip(),$(".booking-form").draggable(),$(".reservation").resizable()}),$(".show-form-booking").click(function(e){$(this).fadeOut(),$(".booking-form").fadeIn()}),$(".close_me").click(function(e){$(".booking-form").fadeOut(),$(".show-form-booking").fadeIn()}),$("span.menu").click(function(){$("ul.cl-effect-1").slideToggle(300)}),$("#owl-demo").owlCarousel({items:4,lazyLoad:!0,autoPlay:!0,navigation:!1,navigationText:!1,pagination:!0,itemsScaleUp:!0});var time=9,$progressBar,$bar,$elem,isPause,tick,percentTime;$("#owl-demo_2").owlCarousel({navigation:!1,slideSpeed:2500,paginationSpeed:700,singleItem:!0, autoPlay: 10000,rewindSpeed: 3000,stopOnHover:!0,afterInit:progressBar,afterMove:moved,startDragging:pauseOnDragging}),$("#owl-demo_2").on("mouseover",function(){isPause=!0}),$("#owl-demo_2").on("mouseout",function(){isPause=!1});var cb=function(){var e=document.createElement("link");e.rel="stylesheet";var t=document.createElement("link");t.rel="stylesheet",e.href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900",t.href="https://fonts.googleapis.com/css?family=Raleway";var o=document.getElementsByTagName("head")[0];o.parentNode.insertBefore(e,o);var i=document.getElementsByTagName("head")[0];i.parentNode.insertBefore(t,i)},raf=requestAnimationFrame||mozRequestAnimationFrame||webkitRequestAnimationFrame||msRequestAnimationFrame;raf?raf(cb):window.addEventListener("load",cb),!function(e,t,o,i,n,a,s){e.GoogleAnalyticsObject=n,e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},e[n].l=1*new Date,a=t.createElement(o),s=t.getElementsByTagName(o)[0],a.async=1,a.src=i,s.parentNode.insertBefore(a,s)}(window,document,"script","/js/analytics.js","ga"),ga("create","UA-46474513-5","auto"),ga("send","pageview");if (($("#<?php echo $rand ?>").length > 0)){ $("html, body").delay(2000).animate({scrollTop: $('#<?php echo $rand ?>').offset().top }, 500); }
			$(".rippler").rippler({effectClass:"rippler-effect",effectSize:16,addElement:"div",duration:400});
});
</script>
<script type="text/javascript" src="/select/js/output.min.js"></script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?47rOM0Jy1qbiOXul45vCAGt0lHs5wXlF";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>

<script type="text/javascript">
	
	$(document).ready(function() {
 
  		$("#side_bar_ca").owlCarousel({
  			items:1,
  			pagination: false,
  			rewindSpeed:200,
  			autoPlay:true,
  			stopOnHover:true,
  			navigation:false,
  		});
 
});
</script>

