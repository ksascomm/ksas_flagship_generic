;(function($,window,undefined){'use strict';var $doc=$(document),Modernizr=window.Modernizr;$(document).ready(function(){$.fn.foundationAccordion?$doc.foundationAccordion():null;$.fn.foundationNavigation?$doc.foundationNavigation():null;$.fn.foundationTabs?$doc.foundationTabs():null;$.fn.foundationClearing?$doc.foundationClearing():null;});if(Modernizr.touch&&!window.location.hash){$(window).load(function(){setTimeout(function(){window.scrollTo(0,1);},0);});}})(jQuery,this);function getParameterByName(name)
{name=name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");var regexS="[\\?&]"+name+"=([^&#]*)";var regex=new RegExp(regexS);var results=regex.exec(window.location.search);if(results==null)
return"";else
return decodeURIComponent(results[1].replace(/\+/g," "));}
(function($,window,document,undefined){$.fn.quicksearch=function(target,opt){var timeout,cache,rowcache,jq_results,val='',e=this,options=$.extend({delay:100,selector:null,stripeRows:null,loader:null,noResults:'',matchedResultsCount:0,bind:'keyup',onBefore:function(){return;},onAfter:function(){return;},show:function(){this.style.opacity="1";},hide:function(){this.style.opacity="0";},prepareQuery:function(val){return val.toLowerCase().split(' ');},testQuery:function(query,txt,_row){for(var i=0;i<query.length;i+=1){if(txt.indexOf(query[i])===-1){return false;}}
return true;}},opt);this.go=function(){var i=0,numMatchedRows=0,noresults=true,query=options.prepareQuery(val),val_empty=(val.replace(' ','').length===0);for(var i=0,len=rowcache.length;i<len;i++){if(val_empty||options.testQuery(query,cache[i],rowcache[i])){options.show.apply(rowcache[i]);noresults=false;numMatchedRows++;}else{options.hide.apply(rowcache[i]);}}
if(noresults){this.results(false);}else{this.results(true);this.stripe();}
this.matchedResultsCount=numMatchedRows;this.loader(false);options.onAfter();return this;};this.search=function(submittedVal){val=submittedVal;e.trigger();};this.currentMatchedResults=function(){return this.matchedResultsCount;};this.stripe=function(){if(typeof options.stripeRows==="object"&&options.stripeRows!==null)
{var joined=options.stripeRows.join(' ');var stripeRows_length=options.stripeRows.length;jq_results.not(':hidden').each(function(i){$(this).removeClass(joined).addClass(options.stripeRows[i%stripeRows_length]);});}
return this;};this.strip_html=function(input){var output=input.replace(new RegExp('<[^<]+\>','g'),"");output=$.trim(output.toLowerCase());return output;};this.results=function(bool){if(typeof options.noResults==="string"&&options.noResults!==""){if(bool){$(options.noResults).hide();}else{$(options.noResults).show();}}
return this;};this.loader=function(bool){if(typeof options.loader==="string"&&options.loader!==""){(bool)?$(options.loader).show():$(options.loader).hide();}
return this;};this.cache=function(){jq_results=$(target);if(typeof options.noResults==="string"&&options.noResults!==""){jq_results=jq_results.not(options.noResults);}
var t=(typeof options.selector==="string")?jq_results.find(options.selector):$(target).not(options.noResults);cache=t.map(function(){return e.strip_html(this.innerHTML);});rowcache=jq_results.map(function(){return this;});val=val||this.val()||"";return this.go();};this.trigger=function(){this.loader(true);options.onBefore();window.clearTimeout(timeout);timeout=window.setTimeout(function(){e.go();},options.delay);return this;};this.cache();this.results(true);this.stripe();this.loader(false);return this.each(function(){$(this).bind(options.bind,function(){val=$(this).val();e.trigger();});});};}(jQuery,this,document));(function($){$.fn.meanmenu=function(options){var defaults={meanMenuTarget:jQuery(this),meanMenuClose:"<h3>CLOSE X</h3>",meanMenuCloseSize:"18px",meanMenuOpen:"<h3>Navigation + </h3>",meanRevealPosition:"left",meanRevealPositionDistance:"15px",meanRevealColour:"",meanRevealHoverColour:"",meanScreenWidth:"768",meanNavPush:"",meanShowChildren:true,meanExpandableChildren:true,meanExpand:"+",meanContract:"-",meanRemoveAttrs:true};var options=$.extend(defaults,options);currentWidth=window.innerWidth||document.documentElement.clientWidth;return this.each(function(){var meanMenu=options.meanMenuTarget;var meanReveal=options.meanReveal;var meanMenuClose=options.meanMenuClose;var meanMenuCloseSize=options.meanMenuCloseSize;var meanMenuOpen=options.meanMenuOpen;var meanRevealPosition=options.meanRevealPosition;var meanRevealPositionDistance=options.meanRevealPositionDistance;var meanRevealColour=options.meanRevealColour;var meanRevealHoverColour=options.meanRevealHoverColour;var meanScreenWidth=options.meanScreenWidth;var meanNavPush=options.meanNavPush;var meanRevealClass=".meanmenu-reveal";meanShowChildren=options.meanShowChildren;meanExpandableChildren=options.meanExpandableChildren;var meanExpand=options.meanExpand;var meanContract=options.meanContract;var meanRemoveAttrs=options.meanRemoveAttrs;if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))||(navigator.userAgent.match(/Android/i))||(navigator.userAgent.match(/Blackberry/i))||(navigator.userAgent.match(/Windows Phone/i))){var isMobile=true;}
if((navigator.userAgent.match(/MSIE 8/i))||(navigator.userAgent.match(/MSIE 7/i))){jQuery('html').css("overflow-y","scroll");}
function meanCentered(){if(meanRevealPosition=="center"){var newWidth=window.innerWidth||document.documentElement.clientWidth;var meanCenter=((newWidth/2)-22)+"px";meanRevealPos="left:"+meanCenter+";right:auto;";if(!isMobile){jQuery('.meanmenu-reveal').css("left",meanCenter);}else{jQuery('.meanmenu-reveal').animate({left:meanCenter});}}}
menuOn=false;meanMenuExist=false;if(meanRevealPosition=="right"){meanRevealPos="right:"+meanRevealPositionDistance+";left:auto;";}
if(meanRevealPosition=="left"){meanRevealPos="left:"+meanRevealPositionDistance+";right:auto;";}
meanCentered();meanStyles="background:"+meanRevealColour+";color:"+meanRevealColour+";"+meanRevealPos;function meanInner(){if(jQuery($navreveal).is(".meanmenu-reveal.meanclose")){$navreveal.html(meanMenuClose);}else{$navreveal.html(meanMenuOpen);}}
function meanOriginal(){jQuery('.mean-bar,.mean-push').remove();jQuery('body').removeClass("mean-container");jQuery(meanMenu).show();menuOn=false;meanMenuExist=false;}
function showMeanMenu(){if(currentWidth<=meanScreenWidth){meanMenuExist=true;jQuery('body').addClass("mean-container");jQuery('.mean-container').prepend('<div class="mean-bar"><a href="#nav" class="meanmenu-reveal" style="'+meanStyles+'">Show Navigation</a><nav class="mean-nav"></nav></div>');var meanMenuContents=jQuery(meanMenu).html();jQuery('.mean-nav').html(meanMenuContents);if(meanRemoveAttrs){jQuery('nav.mean-nav *').each(function(){jQuery(this).removeAttr("class");jQuery(this).removeAttr("id");});}
jQuery(meanMenu).before('<div class="mean-push" />');jQuery('.mean-push').css("margin-top",meanNavPush);jQuery(meanMenu).hide();jQuery(".meanmenu-reveal").show();jQuery(meanRevealClass).html(meanMenuOpen);$navreveal=jQuery(meanRevealClass);jQuery('.mean-nav ul').hide();if(meanShowChildren){if(meanExpandableChildren){jQuery('.mean-nav ul ul').each(function(){if(jQuery(this).children().length){jQuery(this,'li:first').parent().append('<a class="mean-expand" href="#" style="font-size: '+meanMenuCloseSize+'">'+meanExpand+'</a>');}});jQuery('.mean-expand').on("click",function(e){e.preventDefault();if(jQuery(this).hasClass("mean-clicked")){jQuery(this).text(meanExpand);console.log("Been clicked");jQuery(this).prev('ul').slideUp(300,function(){});}else{jQuery(this).text(meanContract);jQuery(this).prev('ul').slideDown(300,function(){});}
jQuery(this).toggleClass("mean-clicked");});}else{jQuery('.mean-nav ul ul').show();}}else{jQuery('.mean-nav ul ul').hide();}
jQuery('.mean-nav ul li').last().addClass('mean-last');$navreveal.removeClass("meanclose");jQuery($navreveal).click(function(e){e.preventDefault();if(menuOn==false){$navreveal.css("text-align","left");$navreveal.css("text-indent","0");$navreveal.css("font-size",meanMenuCloseSize);jQuery('.mean-nav ul:first').slideDown();menuOn=true;}else{jQuery('.mean-nav ul:first').slideUp();menuOn=false;}
$navreveal.toggleClass("meanclose");meanInner();});}else{meanOriginal();}}
if(!isMobile){jQuery(window).resize(function(){currentWidth=window.innerWidth||document.documentElement.clientWidth;if(currentWidth>meanScreenWidth){meanOriginal();}else{meanOriginal();}
if(currentWidth<=meanScreenWidth){showMeanMenu();meanCentered();}else{meanOriginal();}});}
window.onorientationchange=function(){meanCentered();currentWidth=window.innerWidth||document.documentElement.clientWidth;if(currentWidth>=meanScreenWidth){meanOriginal();}
if(currentWidth<=meanScreenWidth){if(meanMenuExist==false){showMeanMenu();}}}
showMeanMenu();});};})(jQuery);var $j=jQuery.noConflict();$j(".acc_expandall").toggle(function(){$j(this).text("[Collapse All]").stop();$j("li .content").show();$j("ul.accordion li").addClass("active");},function(){$j(this).text("[Expand All]").stop();$j("li .content").hide();$j("ul.accordion li").removeClass("active");});$j('#quicksearch').quicksearch('.accordion li li',{delay:100,bind:'onchange keyup',noResults:'#noresults','hide':function(){$j(this).addClass('quicksearch-match');},'show':function(){$j(this).removeClass('quicksearch-match');}}).keyup(function(){setTimeout(function(){$j(".acc_expandall").text("[Collapse All]").stop();$j("li .content").show();$j("ul.accordion li").addClass("active");},100);});