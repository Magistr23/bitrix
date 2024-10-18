; /* /bitrix/js/main/polyfill/intersectionobserver/js/intersectionobserver.min.js?17289195907124*/

; /* Start:"a:4:{s:4:"full";s:91:"/bitrix/js/main/polyfill/intersectionobserver/js/intersectionobserver.min.js?17289195907124";s:6:"source";s:72:"/bitrix/js/main/polyfill/intersectionobserver/js/intersectionobserver.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
(function(t,e){"use strict";if("IntersectionObserver"in t&&"IntersectionObserverEntry"in t&&"intersectionRatio"in t.IntersectionObserverEntry.prototype){if(!("isIntersecting"in t.IntersectionObserverEntry.prototype)){Object.defineProperty(t.IntersectionObserverEntry.prototype,"isIntersecting",{get:function(){return this.intersectionRatio>0}})}return}var r=[];function n(t){this.time=t.time;this.target=t.target;this.rootBounds=t.rootBounds;this.boundingClientRect=t.boundingClientRect;this.intersectionRect=t.intersectionRect||f();this.isIntersecting=!!t.intersectionRect;var e=this.boundingClientRect;var r=e.width*e.height;var n=this.intersectionRect;var i=n.width*n.height;if(r){this.intersectionRatio=i/r}else{this.intersectionRatio=this.isIntersecting?1:0}}function i(t,e){var r=e||{};if(typeof t!=="function"){throw new Error("callback must be a function")}if(r.root&&r.root.nodeType!==1){throw new Error("root must be an Element")}this._checkForIntersections=s(this._checkForIntersections.bind(this),this.THROTTLE_TIMEOUT);this._callback=t;this._observationTargets=[];this._queuedEntries=[];this._rootMarginValues=this._parseRootMargin(r.rootMargin);this.thresholds=this._initThresholds(r.threshold);this.root=r.root||null;this.rootMargin=this._rootMarginValues.map(function(t){return t.value+t.unit}).join(" ")}i.prototype.THROTTLE_TIMEOUT=100;i.prototype.POLL_INTERVAL=null;i.prototype.USE_MUTATION_OBSERVER=true;i.prototype.observe=function(t){var e=this._observationTargets.some(function(e){return e.element===t});if(e){return}if(!(t&&t.nodeType===1)){throw new Error("target must be an Element")}this._registerInstance();this._observationTargets.push({element:t,entry:null});this._monitorIntersections();this._checkForIntersections()};i.prototype.unobserve=function(t){this._observationTargets=this._observationTargets.filter(function(e){return e.element!==t});if(!this._observationTargets.length){this._unmonitorIntersections();this._unregisterInstance()}};i.prototype.disconnect=function(){this._observationTargets=[];this._unmonitorIntersections();this._unregisterInstance()};i.prototype.takeRecords=function(){var t=this._queuedEntries.slice();this._queuedEntries=[];return t};i.prototype._initThresholds=function(t){var e=t||[0];if(!Array.isArray(e)){e=[e]}return e.sort().filter(function(t,e,r){if(typeof t!=="number"||isNaN(t)||t<0||t>1){throw new Error("threshold must be a number between 0 and 1 inclusively")}return t!==r[e-1]})};i.prototype._parseRootMargin=function(t){var e=t||"0px";var r=e.split(/\s+/).map(function(t){var e=/^(-?\d*\.?\d+)(px|%)$/.exec(t);if(!e){throw new Error("rootMargin must be specified in pixels or percent")}return{value:parseFloat(e[1]),unit:e[2]}});r[1]=r[1]||r[0];r[2]=r[2]||r[0];r[3]=r[3]||r[1];return r};i.prototype._monitorIntersections=function(){if(!this._monitoringIntersections){this._monitoringIntersections=true;if(this.POLL_INTERVAL){this._monitoringInterval=setInterval(this._checkForIntersections,this.POLL_INTERVAL)}else{h(t,"resize",this._checkForIntersections,true);h(e,"scroll",this._checkForIntersections,true);if(this.USE_MUTATION_OBSERVER&&"MutationObserver"in t){this._domObserver=new MutationObserver(this._checkForIntersections);this._domObserver.observe(e,{attributes:true,childList:true,characterData:true,subtree:true})}}}};i.prototype._unmonitorIntersections=function(){if(this._monitoringIntersections){this._monitoringIntersections=false;clearInterval(this._monitoringInterval);this._monitoringInterval=null;c(t,"resize",this._checkForIntersections,true);c(e,"scroll",this._checkForIntersections,true);if(this._domObserver){this._domObserver.disconnect();this._domObserver=null}}};i.prototype._checkForIntersections=function(){var t=this._rootIsInDom();var e=t?this._getRootRect():f();this._observationTargets.forEach(function(r){var i=r.element;var s=u(i);var h=this._rootContainsTarget(i);var c=r.entry;var a=t&&h&&this._computeTargetAndRootIntersection(i,e);var f=r.entry=new n({time:o(),target:i,boundingClientRect:s,rootBounds:e,intersectionRect:a});if(!c){this._queuedEntries.push(f)}else if(t&&h){if(this._hasCrossedThreshold(c,f)){this._queuedEntries.push(f)}}else{if(c&&c.isIntersecting){this._queuedEntries.push(f)}}},this);if(this._queuedEntries.length){this._callback(this.takeRecords(),this)}};i.prototype._computeTargetAndRootIntersection=function(r,n){if(t.getComputedStyle(r).display==="none"){return}var i=u(r);var o=p(r);var s=false;while(!s){var h=null;var c=o.nodeType===1?t.getComputedStyle(o):{};if(c.display=="none"){return}if(o===this.root||o===e){s=true;h=n}else{if(o!=e.body&&o!=e.documentElement&&c.overflow!="visible"){h=u(o)}}if(h){i=a(h,i);if(!i){break}}o=p(o)}return i};i.prototype._getRootRect=function(){var t;if(this.root){t=u(this.root)}else{var r=e.documentElement;var n=e.body;t={top:0,left:0,right:r.clientWidth||n.clientWidth,width:r.clientWidth||n.clientWidth,bottom:r.clientHeight||n.clientHeight,height:r.clientHeight||n.clientHeight}}return this._expandRectByRootMargin(t)};i.prototype._expandRectByRootMargin=function(t){var e=this._rootMarginValues.map(function(e,r){return e.unit==="px"?e.value:e.value*(r%2?t.width:t.height)/100});var r={top:t.top-e[0],right:t.right+e[1],bottom:t.bottom+e[2],left:t.left-e[3]};r.width=r.right-r.left;r.height=r.bottom-r.top;return r};i.prototype._hasCrossedThreshold=function(t,e){var r=t&&t.isIntersecting?t.intersectionRatio||0:-1;var n=e.isIntersecting?e.intersectionRatio||0:-1;if(r===n){return}for(var i=0;i<this.thresholds.length;i++){var o=this.thresholds[i];if(o==r||o==n||o<r!==o<n){return true}}};i.prototype._rootIsInDom=function(){return!this.root||l(e,this.root)};i.prototype._rootContainsTarget=function(t){return l(this.root||e,t)};i.prototype._registerInstance=function(){if(r.indexOf(this)<0){r.push(this)}};i.prototype._unregisterInstance=function(){var t=r.indexOf(this);if(t!==-1){r.splice(t,1)}};function o(){return t.performance&&performance.now&&performance.now()}function s(t,e){var r=null;return function(){if(!r){r=setTimeout(function(){t();r=null},e)}}}function h(t,e,r,n){if(typeof t.addEventListener=="function"){t.addEventListener(e,r,n||false)}else if(typeof t.attachEvent==="function"){t.attachEvent("on"+e,r)}}function c(t,e,r,n){if(typeof t.removeEventListener==="function"){t.removeEventListener(e,r,n||false)}else if(typeof t.detatchEvent==="function"){t.detatchEvent("on"+e,r)}}function a(t,e){var r=Math.max(t.top,e.top);var n=Math.min(t.bottom,e.bottom);var i=Math.max(t.left,e.left);var o=Math.min(t.right,e.right);var s=o-i;var h=n-r;return s>=0&&h>=0&&{top:r,bottom:n,left:i,right:o,width:s,height:h}}function u(t){var e;try{e=t.getBoundingClientRect()}catch(t){}if(!e){return f()}if(!(e.width&&e.height)){e={top:e.top,right:e.right,bottom:e.bottom,left:e.left,width:e.right-e.left,height:e.bottom-e.top}}return e}function f(){return{top:0,bottom:0,left:0,right:0,width:0,height:0}}function l(t,e){var r=e;while(r){if(r===t){return true}r=p(r)}return false}function p(t){var e=t.parentNode;if(e&&e.nodeType==11&&e.host){return e.host}return e}t.IntersectionObserver=i;t.IntersectionObserverEntry=n})(window,document);
/* End */
;