"use strict";(function(){window.NodeList&&!NodeList.prototype.forEach&&(NodeList.prototype.forEach=Array.prototype.forEach),function(){var a=document.querySelectorAll(".swa-associates-finder__form");a.forEach(function(a){var b=document.querySelectorAll(".swa-select");b.forEach(function(b){var c=a.querySelector("input[name=\"".concat(b.dataset["for"],"\"]")),d=b.querySelectorAll(".swa-select__option"),e=b.querySelector(".swa-select__selected");d.forEach(function(a){a.addEventListener("click",function(){d.forEach(function(a){return a.classList.remove("selected")}),a.classList.add("selected"),c.value=a.dataset.value,e.innerHTML=a.innerHTML})})})})}()})();