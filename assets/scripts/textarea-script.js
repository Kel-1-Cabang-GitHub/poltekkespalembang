const textarea = document.querySelector("textarea");
textAreaAdjust(textarea);

function textAreaAdjust(element) {
    element.style.height = "1px";
    element.style.height = (25+element.scrollHeight)+"px";
}