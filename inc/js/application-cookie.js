/* 
 * Add Application ID into Cookie
 */

jQuery(document).ready(function () {

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var cookieVal = getCookie("applicationid");
    /* if (cookieVal !== "") {
        jQuery(document).find("a").attr("href", function (i, h) {
            return h + (h.indexOf('?') != -1 ? "&applicationid=" + cookieVal : "?applicationid=" + cookieVal);
        });
    } */
    if(jQuery(document).find("#appidfield").length > 0) {
   jQuery(document).find("#appidfield").attr("value", cookieVal);
}
});