
elixir.removeHREFFromNav={};elixir.removeHREFFromNav=(function(){var jQuery=elixir.jQuery;var $=jQuery;var $elixir=jQuery.noConflict();function removeHREFFromNavFunction(){$('nav#site-navigation > ul > li > a.parent, nav#mobile-navigation > ul > li > a.parent').removeAttr('href');}
$(document).ready(function(){removeHREFFromNavFunction();});})(elixir.removeHREFFromNav);