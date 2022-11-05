<script type="text/javascript">
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert(xmlhttp);
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
        // alert(e);

//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }

    function makerequest(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'find_supplier.php?text=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                if (xmlhttp.responseText == 'Alredy Exists')
                {
                    document.getElementById('btn').disabled = true;
                }
                else {
                    document.getElementById('btn').disabled = false;
                }
            }
        }
        xmlhttp.send(null);
    }
    function find_supplier(given_text, objID)
    {
        //alert(given_text);
        //var obj = document.getElementById(objID);
        serverPage = 'get_supplier.php?text=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                //alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>