<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title></title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="../assets/css/neon.css">
	<script src="../assets/js/jquery-1.11.0.min.js"></script>
	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="wrap">
	<?php include_once"../scripts/header.php" ;?>
</div>	
<section class="breadcrumb hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1>Settlement Explorer</h1>
			</li>
			<li class="hidden-xs">
				<p>Below you can find recent noteworthy cases as well as filter for all cases in our database. To begin simply click on a case you are interested in to view more information or 
					use the "filter options" toolbar below to search for a case or cases within a given date range.
				</p>
			</li>
			</div>
			<div class="col-sm-3">
			</div>
			<div class="col-sm-3 ">

				<h2 class=" text-muted text-right"><small>With CCC You Can    </small>    <br/>Monitor And Track Over 500 Settlements</h2>
			</div>
		</div>
	</div>
</section>
<!-- Blog -->
<section class="blog">
<div class="container">
<nav class="navbar main-nav hidden-xs" style="background-color: rgba(62,180,230, 1);" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Filter Options</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



      <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search" method="post">
        <div class="form-group">
           <input class="form-control col-md-10"  name="id" onclick="showUser(this.value)" id="query" placeholder="Search a Case" type="text">  
        </div>
        <button type="submit" class="btn btn-default">Search</button>
        <button type="submit" class="btn btn-warning">Refresh List</button>

      </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<form class="form-horizontal hidden" >
	    <!-- Select Multiple -->
	<div class="form-group">
	<legend>Choose by Case</legend>



		  <div class="">
				<select id="selectmultiple"  multiple="multiple" class="form-control " name="users" onchange="showUser(this.value)">

				<?php

				$con = mysqli_connect('192.168.0.17','asaviano','CCCrules1','music_man');
				if (!$con) {
				    die('Could not connect: ' . mysqli_error($con));
				}

	
					mysqli_select_db($con,"music_man");
					$sql="SELECT * FROM mon_cases  ";
					$result = mysqli_query($con,$sql);
							while($row = mysqli_fetch_array($result)) {
					    echo "<option value='" . $row2['ID'] . "'>" . $row2['Case_Name'] . "</option>";

					}
				

			

				?>
		    </select>
		  </div>
		</div>
</form>


<div class="col-md-12">
<div id="txtHint" class="expandUp"><b> 

<?php
if (ISSET($_POST['id'])){
$sql2="SELECT * FROM mon_cases WHERE Case_Name='".$_POST['id']."'";

$result2= mysqli_query($con,$sql2);


while($row2 = mysqli_fetch_array($result2)) {
    echo'       
    <div class="panel panel-default  expandUp slideLeft">
      <div class="panel-heading"></div>
      <div class="panel-body">
        <h2><img src="'.$row2['img'].'" class="img-circle" style="height:50px;width:50px;">  '.$row2['Case_Name'].' <span class="label label-success">$'.number_format($row2['Settlement_Fund']).'</span> </h2> 
          <p>'.$row2['Notes'].'</p>
          <hr>
          <img class="media-object hidden" src="http://placehold.it/600x200" width="100%">
          <article>
             <table class="table table-striped" id="tblGrid">
              <tbody>
                <tr><td>Status</td>
                  <td class="text-right">'.$row2['Web_Status'].' </td>
                </tr>
              
    

                <tr><td>End Date</td>
                  <td class="text-right">'.$row2['End'].'</td>
                </tr>
                <tr><td>Deadline</td>
                  <td class="text-right">'.$row2['Deadline'].'</td>
                </tr>

                <tr><td>Claim Number</td>
                  <td class="text-right"><span class="label label-primary">Login To View</span></td>
                </tr>

                <tr><td>Claim Form</td>
                  <td class="text-right"><span class="label label-primary">Login To View</span></td>
                </tr>
                <tr><td>Notice</td>
                  <td class="text-right"><span class="label label-primary">Login To View</span></td>
                </tr>
                <tr><td>Administrator</td>
                  <td class="text-right"><span class="label label-primary">Login To View</span></td>
                </tr>

                <tr><td>Issuer</td>
                  <td class="text-right"><span class="label label-primary">Login To View</span></td>
                </tr>
              </tbody>
            </table>
          </article>
        <hr>
        <a href="index.php?action=get_app_list" class="col-md-4 pull-left btn btn-default" id="back" alt="app list">Back To All</a>
        <a href="learn-more.php" class="col-md-4 pull-right btn btn-success" id="back" alt="app list">Learn More</a>
        </div>
    </div><br/>
    <h2>Recent Settlements</h2><hr>

 ';
}}
	$sql="SELECT * FROM mon_cases ORDER BY ID DESC LIMIT 12 ";
	$result2 = mysqli_query($con,$sql);

	while($row2= mysqli_fetch_array($result2)) {
	    echo '	
		<button onclick="showUser(this.value);showDiv()" 
					name="name" 
					class="name col-md-12 cards"
					value="'.$row2['ID'].'" 
					role="button"  
					id="case" 
					style="background:none;border:none;box-shadow:none;text-align:left;margin-bottom:10px;">
                                  
	     	<div class="media">

		
				<div class="media-body" style="height:75px;overflow:hiddenpadding:20px;">

				<div class="row">

				<div class="col-md-10">
				    <h4 class="media-heading">' . $row2['Case_Name'] . '</h4>
				    <p>' . $row2['Notes'] . '</p>
				</div>';?>
      <?php if (ISSET($row2['img'])){
        echo'
        <div class="col-md-2">
            <img class="col-md-12" style="border-bottom:1px solid #eeeeee;height:100px;margin-bottom:15px;margin-top:15px;" src="'.$row2['img'].'">
        </div>';
      }

      ?>

	<?php echo '
				</div>
			</div>
		</button>
		';
	}
	mysqli_close($con);
?>
<script>
$(function(){
	$(document).on( 'scroll', function(){
		if ($(window).scrollTop() > 100) {
			$('.cards').addClass('show');
		} else {
			$('.cards').removeClass('show');
		}
	});
	$('.cards').on('click', scrollToTop);
});
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
</script>
	</div>
    </ul>
  </div> 
  <div class="col-md-3">
  <!-- /container -->
</div>
</div>
    </ul>
    <!-- Core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script>
		$('#action').click(function() {
			$(this).addClass("expandUp");
		});
	</script>
	<script>
		$('#back').click(function() {
			$('#action').addClass("slideRight");
		});
$('#openBtn').click(function(){
	$('#myModal').modal({show:true})
});
$("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          return $('#popover-content').html();
        }
});
	</script>
  </body>
</html>
<script>
function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","client.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>




<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","client.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>





<style>
.stuff{margin-top:50px;}
.btn-success{background:green;}
.main{background:#fff;padding:5px;}
.navbar-fixed-top{background:#78c2d3;border:none;}

.navbar-simple{border:none;background:#eeeeee;box-shadow:none;}

.navbar-fixed-bottom .nav li a {color:#000;}

.navbar-brand{color:#fff;}
.panel .panel-heading{background:none;border:none;color:#fff;}
.slideRight{visibility:hidden;}
.media{background:#fff;padding:5px;box-shadow: 1px 1px 3px #ccc;
}
.panels {
visibility: hidden;background:#fff;
}
.name:hover{border:1px solid #000;}

* {
  box-sizing: border-box;
}


.main-nav{
  position: relative; 
}
.main-nav {
  z-index: 150;
  box-shadow: 0 2px 3px rgba(0,0,0,.4);

}

.main-nav-scrolled {
  position: fixed;
  width: 80%;
  top: 0;
}
.main {
  background: #f2f2e8;
  column-count: 2;
  column-gap: 40px;
}
button .cards:hover{border:solid 1px blue;}

</style>


		</div>
		
	</div>
	
</section>	
</div>
<!-- Form Name -->
<script>
/*!
 * typeahead.js 0.9.3
 * https://github.com/twitter/typeahead
 * Copyright 2013 Twitter, Inc. and other contributors; Licensed MIT
 */

!function(a){var b="0.9.3",c={isMsie:function(){var a=/(msie) ([\w.]+)/i.exec(navigator.userAgent);return a?parseInt(a[2],10):!1},isBlankString:function(a){return!a||/^\s*$/.test(a)},escapeRegExChars:function(a){return a.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")},isString:function(a){return"string"==typeof a},isNumber:function(a){return"number"==typeof a},isArray:a.isArray,isFunction:a.isFunction,isObject:a.isPlainObject,isUndefined:function(a){return"undefined"==typeof a},bind:a.proxy,bindAll:function(b){var c;for(var d in b)a.isFunction(c=b[d])&&(b[d]=a.proxy(c,b))},indexOf:function(a,b){for(var c=0;c<a.length;c++)if(a[c]===b)return c;return-1},each:a.each,map:a.map,filter:a.grep,every:function(b,c){var d=!0;return b?(a.each(b,function(a,e){return(d=c.call(null,e,a,b))?void 0:!1}),!!d):d},some:function(b,c){var d=!1;return b?(a.each(b,function(a,e){return(d=c.call(null,e,a,b))?!1:void 0}),!!d):d},mixin:a.extend,getUniqueId:function(){var a=0;return function(){return a++}}(),defer:function(a){setTimeout(a,0)},debounce:function(a,b,c){var d,e;return function(){var f,g,h=this,i=arguments;return f=function(){d=null,c||(e=a.apply(h,i))},g=c&&!d,clearTimeout(d),d=setTimeout(f,b),g&&(e=a.apply(h,i)),e}},throttle:function(a,b){var c,d,e,f,g,h;return g=0,h=function(){g=new Date,e=null,f=a.apply(c,d)},function(){var i=new Date,j=b-(i-g);return c=this,d=arguments,0>=j?(clearTimeout(e),e=null,g=i,f=a.apply(c,d)):e||(e=setTimeout(h,j)),f}},tokenizeQuery:function(b){return a.trim(b).toLowerCase().split(/[\s]+/)},tokenizeText:function(b){return a.trim(b).toLowerCase().split(/[\s\-_]+/)},getProtocol:function(){return location.protocol},noop:function(){}},d=function(){var a=/\s+/;return{on:function(b,c){var d;if(!c)return this;for(this._callbacks=this._callbacks||{},b=b.split(a);d=b.shift();)this._callbacks[d]=this._callbacks[d]||[],this._callbacks[d].push(c);return this},trigger:function(b,c){var d,e;if(!this._callbacks)return this;for(b=b.split(a);d=b.shift();)if(e=this._callbacks[d])for(var f=0;f<e.length;f+=1)e[f].call(this,{type:d,data:c});return this}}}(),e=function(){function b(b){b&&b.el||a.error("EventBus initialized without el"),this.$el=a(b.el)}var d="typeahead:";return c.mixin(b.prototype,{trigger:function(a){var b=[].slice.call(arguments,1);this.$el.trigger(d+a,b)}}),b}(),f=function(){function a(a){this.prefix=["__",a,"__"].join(""),this.ttlKey="__ttl__",this.keyMatcher=new RegExp("^"+this.prefix)}function b(){return(new Date).getTime()}function d(a){return JSON.stringify(c.isUndefined(a)?null:a)}function e(a){return JSON.parse(a)}var f,g;try{f=window.localStorage,f.setItem("~~~","!"),f.removeItem("~~~")}catch(h){f=null}return g=f&&window.JSON?{_prefix:function(a){return this.prefix+a},_ttlKey:function(a){return this._prefix(a)+this.ttlKey},get:function(a){return this.isExpired(a)&&this.remove(a),e(f.getItem(this._prefix(a)))},set:function(a,e,g){return c.isNumber(g)?f.setItem(this._ttlKey(a),d(b()+g)):f.removeItem(this._ttlKey(a)),f.setItem(this._prefix(a),d(e))},remove:function(a){return f.removeItem(this._ttlKey(a)),f.removeItem(this._prefix(a)),this},clear:function(){var a,b,c=[],d=f.length;for(a=0;d>a;a++)(b=f.key(a)).match(this.keyMatcher)&&c.push(b.replace(this.keyMatcher,""));for(a=c.length;a--;)this.remove(c[a]);return this},isExpired:function(a){var d=e(f.getItem(this._ttlKey(a)));return c.isNumber(d)&&b()>d?!0:!1}}:{get:c.noop,set:c.noop,remove:c.noop,clear:c.noop,isExpired:c.noop},c.mixin(a.prototype,g),a}(),g=function(){function a(a){c.bindAll(this),a=a||{},this.sizeLimit=a.sizeLimit||10,this.cache={},this.cachedKeysByAge=[]}return c.mixin(a.prototype,{get:function(a){return this.cache[a]},set:function(a,b){var c;this.cachedKeysByAge.length===this.sizeLimit&&(c=this.cachedKeysByAge.shift(),delete this.cache[c]),this.cache[a]=b,this.cachedKeysByAge.push(a)}}),a}(),h=function(){function b(a){c.bindAll(this),a=c.isString(a)?{url:a}:a,i=i||new g,h=c.isNumber(a.maxParallelRequests)?a.maxParallelRequests:h||6,this.url=a.url,this.wildcard=a.wildcard||"%QUERY",this.filter=a.filter,this.replace=a.replace,this.ajaxSettings={type:"get",cache:a.cache,timeout:a.timeout,dataType:a.dataType||"json",beforeSend:a.beforeSend},this._get=(/^throttle$/i.test(a.rateLimitFn)?c.throttle:c.debounce)(this._get,a.rateLimitWait||300)}function d(){j++}function e(){j--}function f(){return h>j}var h,i,j=0,k={};return c.mixin(b.prototype,{_get:function(a,b){function c(c){var e=d.filter?d.filter(c):c;b&&b(e),i.set(a,c)}var d=this;f()?this._sendRequest(a).done(c):this.onDeckRequestArgs=[].slice.call(arguments,0)},_sendRequest:function(b){function c(){e(),k[b]=null,f.onDeckRequestArgs&&(f._get.apply(f,f.onDeckRequestArgs),f.onDeckRequestArgs=null)}var f=this,g=k[b];return g||(d(),g=k[b]=a.ajax(b,this.ajaxSettings).always(c)),g},get:function(a,b){var d,e,f=this,g=encodeURIComponent(a||"");return b=b||c.noop,d=this.replace?this.replace(this.url,g):this.url.replace(this.wildcard,g),(e=i.get(d))?c.defer(function(){b(f.filter?f.filter(e):e)}):this._get(d,b),!!e}}),b}(),i=function(){function d(b){c.bindAll(this),c.isString(b.template)&&!b.engine&&a.error("no template engine specified"),b.local||b.prefetch||b.remote||a.error("one of local, prefetch, or remote is required"),this.name=b.name||c.getUniqueId(),this.limit=b.limit||5,this.minLength=b.minLength||1,this.header=b.header,this.footer=b.footer,this.valueKey=b.valueKey||"value",this.template=e(b.template,b.engine,this.valueKey),this.local=b.local,this.prefetch=b.prefetch,this.remote=b.remote,this.itemHash={},this.adjacencyList={},this.storage=b.name?new f(b.name):null}function e(a,b,d){var e,f;return c.isFunction(a)?e=a:c.isString(a)?(f=b.compile(a),e=c.bind(f.render,f)):e=function(a){return"<p>"+a[d]+"</p>"},e}var g={thumbprint:"thumbprint",protocol:"protocol",itemHash:"itemHash",adjacencyList:"adjacencyList"};return c.mixin(d.prototype,{_processLocalData:function(a){this._mergeProcessedData(this._processData(a))},_loadPrefetchData:function(d){function e(a){var b=d.filter?d.filter(a):a,e=m._processData(b),f=e.itemHash,h=e.adjacencyList;m.storage&&(m.storage.set(g.itemHash,f,d.ttl),m.storage.set(g.adjacencyList,h,d.ttl),m.storage.set(g.thumbprint,n,d.ttl),m.storage.set(g.protocol,c.getProtocol(),d.ttl)),m._mergeProcessedData(e)}var f,h,i,j,k,l,m=this,n=b+(d.thumbprint||"");return this.storage&&(f=this.storage.get(g.thumbprint),h=this.storage.get(g.protocol),i=this.storage.get(g.itemHash),j=this.storage.get(g.adjacencyList)),k=f!==n||h!==c.getProtocol(),d=c.isString(d)?{url:d}:d,d.ttl=c.isNumber(d.ttl)?d.ttl:864e5,i&&j&&!k?(this._mergeProcessedData({itemHash:i,adjacencyList:j}),l=a.Deferred().resolve()):l=a.getJSON(d.url).done(e),l},_transformDatum:function(a){var b=c.isString(a)?a:a[this.valueKey],d=a.tokens||c.tokenizeText(b),e={value:b,tokens:d};return c.isString(a)?(e.datum={},e.datum[this.valueKey]=a):e.datum=a,e.tokens=c.filter(e.tokens,function(a){return!c.isBlankString(a)}),e.tokens=c.map(e.tokens,function(a){return a.toLowerCase()}),e},_processData:function(a){var b=this,d={},e={};return c.each(a,function(a,f){var g=b._transformDatum(f),h=c.getUniqueId(g.value);d[h]=g,c.each(g.tokens,function(a,b){var d=b.charAt(0),f=e[d]||(e[d]=[h]);!~c.indexOf(f,h)&&f.push(h)})}),{itemHash:d,adjacencyList:e}},_mergeProcessedData:function(a){var b=this;c.mixin(this.itemHash,a.itemHash),c.each(a.adjacencyList,function(a,c){var d=b.adjacencyList[a];b.adjacencyList[a]=d?d.concat(c):c})},_getLocalSuggestions:function(a){var b,d=this,e=[],f=[],g=[];return c.each(a,function(a,b){var d=b.charAt(0);!~c.indexOf(e,d)&&e.push(d)}),c.each(e,function(a,c){var e=d.adjacencyList[c];return e?(f.push(e),(!b||e.length<b.length)&&(b=e),void 0):!1}),f.length<e.length?[]:(c.each(b,function(b,e){var h,i,j=d.itemHash[e];h=c.every(f,function(a){return~c.indexOf(a,e)}),i=h&&c.every(a,function(a){return c.some(j.tokens,function(b){return 0===b.indexOf(a)})}),i&&g.push(j)}),g)},initialize:function(){var b;return this.local&&this._processLocalData(this.local),this.transport=this.remote?new h(this.remote):null,b=this.prefetch?this._loadPrefetchData(this.prefetch):a.Deferred().resolve(),this.local=this.prefetch=this.remote=null,this.initialize=function(){return b},b},getSuggestions:function(a,b){function d(a){f=f.slice(0),c.each(a,function(a,b){var d,e=g._transformDatum(b);return d=c.some(f,function(a){return e.value===a.value}),!d&&f.push(e),f.length<g.limit}),b&&b(f)}var e,f,g=this,h=!1;a.length<this.minLength||(e=c.tokenizeQuery(a),f=this._getLocalSuggestions(e).slice(0,this.limit),f.length<this.limit&&this.transport&&(h=this.transport.get(a,d)),!h&&b&&b(f))}}),d}(),j=function(){function b(b){var d=this;c.bindAll(this),this.specialKeyCodeMap={9:"tab",27:"esc",37:"left",39:"right",13:"enter",38:"up",40:"down"},this.$hint=a(b.hint),this.$input=a(b.input).on("blur.tt",this._handleBlur).on("focus.tt",this._handleFocus).on("keydown.tt",this._handleSpecialKeyEvent),c.isMsie()?this.$input.on("keydown.tt keypress.tt cut.tt paste.tt",function(a){d.specialKeyCodeMap[a.which||a.keyCode]||c.defer(d._compareQueryToInputValue)}):this.$input.on("input.tt",this._compareQueryToInputValue),this.query=this.$input.val(),this.$overflowHelper=e(this.$input)}function e(b){return a("<span></span>").css({position:"absolute",left:"-9999px",visibility:"hidden",whiteSpace:"nowrap",fontFamily:b.css("font-family"),fontSize:b.css("font-size"),fontStyle:b.css("font-style"),fontVariant:b.css("font-variant"),fontWeight:b.css("font-weight"),wordSpacing:b.css("word-spacing"),letterSpacing:b.css("letter-spacing"),textIndent:b.css("text-indent"),textRendering:b.css("text-rendering"),textTransform:b.css("text-transform")}).insertAfter(b)}function f(a,b){return a=(a||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),b=(b||"").replace(/^\s*/g,"").replace(/\s{2,}/g," "),a===b}return c.mixin(b.prototype,d,{_handleFocus:function(){this.trigger("focused")},_handleBlur:function(){this.trigger("blured")},_handleSpecialKeyEvent:function(a){var b=this.specialKeyCodeMap[a.which||a.keyCode];b&&this.trigger(b+"Keyed",a)},_compareQueryToInputValue:function(){var a=this.getInputValue(),b=f(this.query,a),c=b?this.query.length!==a.length:!1;c?this.trigger("whitespaceChanged",{value:this.query}):b||this.trigger("queryChanged",{value:this.query=a})},destroy:function(){this.$hint.off(".tt"),this.$input.off(".tt"),this.$hint=this.$input=this.$overflowHelper=null},focus:function(){this.$input.focus()},blur:function(){this.$input.blur()},getQuery:function(){return this.query},setQuery:function(a){this.query=a},getInputValue:function(){return this.$input.val()},setInputValue:function(a,b){this.$input.val(a),!b&&this._compareQueryToInputValue()},getHintValue:function(){return this.$hint.val()},setHintValue:function(a){this.$hint.val(a)},getLanguageDirection:function(){return(this.$input.css("direction")||"ltr").toLowerCase()},isOverflow:function(){return this.$overflowHelper.text(this.getInputValue()),this.$overflowHelper.width()>this.$input.width()},isCursorAtEnd:function(){var a,b=this.$input.val().length,d=this.$input[0].selectionStart;return c.isNumber(d)?d===b:document.selection?(a=document.selection.createRange(),a.moveStart("character",-b),b===a.text.length):!0}}),b}(),k=function(){function b(b){c.bindAll(this),this.isOpen=!1,this.isEmpty=!0,this.isMouseOverDropdown=!1,this.$menu=a(b.menu).on("mouseenter.tt",this._handleMouseenter).on("mouseleave.tt",this._handleMouseleave).on("click.tt",".tt-suggestion",this._handleSelection).on("mouseover.tt",".tt-suggestion",this._handleMouseover)}function e(a){return a.data("suggestion")}var f={suggestionsList:'<span class="tt-suggestions"></span>'},g={suggestionsList:{display:"block"},suggestion:{whiteSpace:"nowrap",cursor:"pointer"},suggestionChild:{whiteSpace:"normal"}};return c.mixin(b.prototype,d,{_handleMouseenter:function(){this.isMouseOverDropdown=!0},_handleMouseleave:function(){this.isMouseOverDropdown=!1},_handleMouseover:function(b){var c=a(b.currentTarget);this._getSuggestions().removeClass("tt-is-under-cursor"),c.addClass("tt-is-under-cursor")},_handleSelection:function(b){var c=a(b.currentTarget);this.trigger("suggestionSelected",e(c))},_show:function(){this.$menu.css("display","block")},_hide:function(){this.$menu.hide()},_moveCursor:function(a){var b,c,d,f;if(this.isVisible()){if(b=this._getSuggestions(),c=b.filter(".tt-is-under-cursor"),c.removeClass("tt-is-under-cursor"),d=b.index(c)+a,d=(d+1)%(b.length+1)-1,-1===d)return this.trigger("cursorRemoved"),void 0;-1>d&&(d=b.length-1),f=b.eq(d).addClass("tt-is-under-cursor"),this._ensureVisibility(f),this.trigger("cursorMoved",e(f))}},_getSuggestions:function(){return this.$menu.find(".tt-suggestions > .tt-suggestion")},_ensureVisibility:function(a){var b=this.$menu.height()+parseInt(this.$menu.css("paddingTop"),10)+parseInt(this.$menu.css("paddingBottom"),10),c=this.$menu.scrollTop(),d=a.position().top,e=d+a.outerHeight(!0);0>d?this.$menu.scrollTop(c+d):e>b&&this.$menu.scrollTop(c+(e-b))},destroy:function(){this.$menu.off(".tt"),this.$menu=null},isVisible:function(){return this.isOpen&&!this.isEmpty},closeUnlessMouseIsOverDropdown:function(){this.isMouseOverDropdown||this.close()},close:function(){this.isOpen&&(this.isOpen=!1,this.isMouseOverDropdown=!1,this._hide(),this.$menu.find(".tt-suggestions > .tt-suggestion").removeClass("tt-is-under-cursor"),this.trigger("closed"))},open:function(){this.isOpen||(this.isOpen=!0,!this.isEmpty&&this._show(),this.trigger("opened"))},setLanguageDirection:function(a){var b={left:"0",right:"auto"},c={left:"auto",right:" 0"};"ltr"===a?this.$menu.css(b):this.$menu.css(c)},moveCursorUp:function(){this._moveCursor(-1)},moveCursorDown:function(){this._moveCursor(1)},getSuggestionUnderCursor:function(){var a=this._getSuggestions().filter(".tt-is-under-cursor").first();return a.length>0?e(a):null},getFirstSuggestion:function(){var a=this._getSuggestions().first();return a.length>0?e(a):null},renderSuggestions:function(b,d){var e,h,i,j,k,l="tt-dataset-"+b.name,m='<div class="tt-suggestion">%body</div>',n=this.$menu.find("."+l);0===n.length&&(h=a(f.suggestionsList).css(g.suggestionsList),n=a("<div></div>").addClass(l).append(b.header).append(h).append(b.footer).appendTo(this.$menu)),d.length>0?(this.isEmpty=!1,this.isOpen&&this._show(),i=document.createElement("div"),j=document.createDocumentFragment(),c.each(d,function(c,d){d.dataset=b.name,e=b.template(d.datum),i.innerHTML=m.replace("%body",e),k=a(i.firstChild).css(g.suggestion).data("suggestion",d),k.children().each(function(){a(this).css(g.suggestionChild)}),j.appendChild(k[0])}),n.show().find(".tt-suggestions").html(j)):this.clearSuggestions(b.name),this.trigger("suggestionsRendered")},clearSuggestions:function(a){var b=a?this.$menu.find(".tt-dataset-"+a):this.$menu.find('[class^="tt-dataset-"]'),c=b.find(".tt-suggestions");b.hide(),c.empty(),0===this._getSuggestions().length&&(this.isEmpty=!0,this._hide())}}),b}(),l=function(){function b(a){var b,d,f;c.bindAll(this),this.$node=e(a.input),this.datasets=a.datasets,this.dir=null,this.eventBus=a.eventBus,b=this.$node.find(".tt-dropdown-menu"),d=this.$node.find(".tt-query"),f=this.$node.find(".tt-hint"),this.dropdownView=new k({menu:b}).on("suggestionSelected",this._handleSelection).on("cursorMoved",this._clearHint).on("cursorMoved",this._setInputValueToSuggestionUnderCursor).on("cursorRemoved",this._setInputValueToQuery).on("cursorRemoved",this._updateHint).on("suggestionsRendered",this._updateHint).on("opened",this._updateHint).on("closed",this._clearHint).on("opened closed",this._propagateEvent),this.inputView=new j({input:d,hint:f}).on("focused",this._openDropdown).on("blured",this._closeDropdown).on("blured",this._setInputValueToQuery).on("enterKeyed tabKeyed",this._handleSelection).on("queryChanged",this._clearHint).on("queryChanged",this._clearSuggestions).on("queryChanged",this._getSuggestions).on("whitespaceChanged",this._updateHint).on("queryChanged whitespaceChanged",this._openDropdown).on("queryChanged whitespaceChanged",this._setLanguageDirection).on("escKeyed",this._closeDropdown).on("escKeyed",this._setInputValueToQuery).on("tabKeyed upKeyed downKeyed",this._managePreventDefault).on("upKeyed downKeyed",this._moveDropdownCursor).on("upKeyed downKeyed",this._openDropdown).on("tabKeyed leftKeyed rightKeyed",this._autocomplete)}function e(b){var c=a(g.wrapper),d=a(g.dropdown),e=a(b),f=a(g.hint);c=c.css(h.wrapper),d=d.css(h.dropdown),f.css(h.hint).css({backgroundAttachment:e.css("background-attachment"),backgroundClip:e.css("background-clip"),backgroundColor:e.css("background-color"),backgroundImage:e.css("background-image"),backgroundOrigin:e.css("background-origin"),backgroundPosition:e.css("background-position"),backgroundRepeat:e.css("background-repeat"),backgroundSize:e.css("background-size")}),e.data("ttAttrs",{dir:e.attr("dir"),autocomplete:e.attr("autocomplete"),spellcheck:e.attr("spellcheck"),style:e.attr("style")}),e.addClass("tt-query").attr({autocomplete:"off",spellcheck:!1}).css(h.query);try{!e.attr("dir")&&e.attr("dir","auto")}catch(i){}return e.wrap(c).parent().prepend(f).append(d)}function f(a){var b=a.find(".tt-query");c.each(b.data("ttAttrs"),function(a,d){c.isUndefined(d)?b.removeAttr(a):b.attr(a,d)}),b.detach().removeData("ttAttrs").removeClass("tt-query").insertAfter(a),a.remove()}var g={wrapper:'<span class="twitter-typeahead"></span>',hint:'<input class="tt-hint" type="text" autocomplete="off" spellcheck="off" disabled>',dropdown:'<span class="tt-dropdown-menu"></span>'},h={wrapper:{position:"relative",display:"inline-block"},hint:{position:"absolute",top:"0",left:"0",borderColor:"transparent",boxShadow:"none"},query:{position:"relative",verticalAlign:"top",backgroundColor:"transparent"},dropdown:{position:"absolute",top:"100%",left:"0",zIndex:"100",display:"none"}};return c.isMsie()&&c.mixin(h.query,{backgroundImage:"url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)"}),c.isMsie()&&c.isMsie()<=7&&(c.mixin(h.wrapper,{display:"inline",zoom:"1"}),c.mixin(h.query,{marginTop:"-1px"})),c.mixin(b.prototype,d,{_managePreventDefault:function(a){var b,c,d=a.data,e=!1;switch(a.type){case"tabKeyed":b=this.inputView.getHintValue(),c=this.inputView.getInputValue(),e=b&&b!==c;break;case"upKeyed":case"downKeyed":e=!d.shiftKey&&!d.ctrlKey&&!d.metaKey}e&&d.preventDefault()},_setLanguageDirection:function(){var a=this.inputView.getLanguageDirection();a!==this.dir&&(this.dir=a,this.$node.css("direction",a),this.dropdownView.setLanguageDirection(a))},_updateHint:function(){var a,b,d,e,f,g=this.dropdownView.getFirstSuggestion(),h=g?g.value:null,i=this.dropdownView.isVisible(),j=this.inputView.isOverflow();h&&i&&!j&&(a=this.inputView.getInputValue(),b=a.replace(/\s{2,}/g," ").replace(/^\s+/g,""),d=c.escapeRegExChars(b),e=new RegExp("^(?:"+d+")(.*$)","i"),f=e.exec(h),this.inputView.setHintValue(a+(f?f[1]:"")))},_clearHint:function(){this.inputView.setHintValue("")},_clearSuggestions:function(){this.dropdownView.clearSuggestions()},_setInputValueToQuery:function(){this.inputView.setInputValue(this.inputView.getQuery())},_setInputValueToSuggestionUnderCursor:function(a){var b=a.data;this.inputView.setInputValue(b.value,!0)},_openDropdown:function(){this.dropdownView.open()},_closeDropdown:function(a){this.dropdownView["blured"===a.type?"closeUnlessMouseIsOverDropdown":"close"]()},_moveDropdownCursor:function(a){var b=a.data;b.shiftKey||b.ctrlKey||b.metaKey||this.dropdownView["upKeyed"===a.type?"moveCursorUp":"moveCursorDown"]()},_handleSelection:function(a){var b="suggestionSelected"===a.type,d=b?a.data:this.dropdownView.getSuggestionUnderCursor();d&&(this.inputView.setInputValue(d.value),b?this.inputView.focus():a.data.preventDefault(),b&&c.isMsie()?c.defer(this.dropdownView.close):this.dropdownView.close(),this.eventBus.trigger("selected",d.datum,d.dataset))},_getSuggestions:function(){var a=this,b=this.inputView.getQuery();c.isBlankString(b)||c.each(this.datasets,function(c,d){d.getSuggestions(b,function(c){b===a.inputView.getQuery()&&a.dropdownView.renderSuggestions(d,c)})})},_autocomplete:function(a){var b,c,d,e,f;("rightKeyed"!==a.type&&"leftKeyed"!==a.type||(b=this.inputView.isCursorAtEnd(),c="ltr"===this.inputView.getLanguageDirection()?"leftKeyed"===a.type:"rightKeyed"===a.type,b&&!c))&&(d=this.inputView.getQuery(),e=this.inputView.getHintValue(),""!==e&&d!==e&&(f=this.dropdownView.getFirstSuggestion(),this.inputView.setInputValue(f.value),this.eventBus.trigger("autocompleted",f.datum,f.dataset)))},_propagateEvent:function(a){this.eventBus.trigger(a.type)},destroy:function(){this.inputView.destroy(),this.dropdownView.destroy(),f(this.$node),this.$node=null},setQuery:function(a){this.inputView.setQuery(a),this.inputView.setInputValue(a),this._clearHint(),this._clearSuggestions(),this._getSuggestions()}}),b}();!function(){var b,d={},f="ttView";b={initialize:function(b){function g(){var b,d=a(this),g=new e({el:d});b=c.map(h,function(a){return a.initialize()}),d.data(f,new l({input:d,eventBus:g=new e({el:d}),datasets:h})),a.when.apply(a,b).always(function(){c.defer(function(){g.trigger("initialized")})})}var h;return b=c.isArray(b)?b:[b],0===b.length&&a.error("no datasets provided"),h=c.map(b,function(a){var b=d[a.name]?d[a.name]:new i(a);return a.name&&(d[a.name]=b),b}),this.each(g)},destroy:function(){function b(){var b=a(this),c=b.data(f);c&&(c.destroy(),b.removeData(f))}return this.each(b)},setQuery:function(b){function c(){var c=a(this).data(f);c&&c.setQuery(b)}return this.each(c)}},jQuery.fn.typeahead=function(a){return b[a]?b[a].apply(this,[].slice.call(arguments,1)):b.initialize.apply(this,arguments)}}()}(window.jQuery);

$('#query').typeahead({        
        local: ['Acclaim Entertainment, Inc.','Adelphia Communications I','American Business Financial Services','American Pharmaceutical Partners','American Tower Corp.','Annuity & Life','Bayer AG Securities','Biovail Corp.','BUCA, Inc.','Cardinal Health','Career Education Corp.','Chicago Bridge & Iron','Chiron Securities','ChoicePoint Securities','CNL Hotels & Resorts','Coca-Cola Securites','CP Ships Ltd. I','Delphi (Deloitte Settlement)','DHB Class Action Litigation','Doral Financial Corp','Dynacq Settlement Fund','El Paso Corporation 2007','Exodus Communications','FARO Technologies','Freddie Mac','Genta, Inc.']
});                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
$('.tt-query').css('background-color','');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
    var  mn = $(".main-nav");
    mns = "main-nav-scrolled";
    hdr = 320;

$(window).scroll(function() {
  if( $(this).scrollTop() > hdr ) {
    mn.addClass(mns);
  } else {
    mn.removeClass(mns);
  }
});                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

</script>
<?php include_once"../scripts/footer.php" ?> 
	<!-- Bottom Scripts -->
	<script src="../assets/js/gsap/main-gsap.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-custom.js"></script>
</body>
</html>
