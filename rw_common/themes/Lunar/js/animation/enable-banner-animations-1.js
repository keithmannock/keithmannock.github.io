
elixir.bannerAnimations={};elixir.bannerAnimations=(function(){var jQuery=elixir.jQuery;var $=jQuery;var $elixir=jQuery.noConflict();function bannerAnimationsFunction(){TweenMax.to("#site-logo",1.2,{delay:0.25,startAt:{y:-100,scale:1.5,rotationY:"-4rad_ccw"},scale:1,rotationY:"0rad_ccw",opacity:1,y:0,ease:Power2.easeOut});TweenMax.to(".site-title",1.5,{delay:0.25,opacity:1,startAt:{y:100},y:0,ease:Power2.easeOut});TweenMax.to(".site-slogan",1.2,{delay:0.75,opacity:1,startAt:{y:50},y:0,ease:Power2.easeOut});TweenMax.staggerFrom(".myBadge",0.8,{delay:1,opacity:0,y:100,scale:2,ease:Power2.easeOut},0.2);TweenMax.to("#extraContent1",1.5,{delay:1.25,opacity:1,ease:Power2.easeOut});}
$(document).ready(function(){bannerAnimationsFunction();});})(elixir.bannerAnimations);