var filename="http://tympanus.net/codrops/adpacks/demoadpacks.css?"+(new Date).getTime(),fileref=document.createElement("link");fileref.setAttribute("rel","stylesheet"),fileref.setAttribute("type","text/css"),fileref.setAttribute("href",filename),document.getElementsByTagName("head")[0].appendChild(fileref);var demoad=document.createElement("div");demoad.id="cdawrap",demoad.innerHTML='<span id="cda-remove"></span>',document.getElementsByTagName("body")[0].appendChild(demoad),document.getElementById("cda-remove").addEventListener("click",function(e){demoad.style.display="none",e.preventDefault()});var bsa=document.createElement("script");bsa.type="text/javascript",bsa.async=!0,bsa.id="_carbonads_js",bsa.src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=codrops",demoad.appendChild(bsa);var adInterval,adChecked=!1,attempts=5,cntAttempts=0;function checkAd(){if(adChecked||cntAttempts>=attempts)clearInterval(adInterval);else{cntAttempts++;var e=document.querySelector(".carbon-img");if(e)e.offsetHeight>=30&&(_gaq.push(["_trackEvent","Codrops Demo Ad","Carbon Ad VISIBLE","Carbon Ad"]),adChecked=!0)}}window._gaq&&(_gaq.push(["_trackEvent","Codrops Demo Ad","Carbon ad included","1"]),adInterval=setInterval(checkAd,3e3));