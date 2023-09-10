window.addEventListener('load', load_fjord_cms_theme, false )

function load_fjord_cms_theme(){
	body = document.getElementsByTagName("body")
	wpadminbar = document.getElementById("wp-toolbar")

	document.getElementById('wp-admin-bar-root-default').innerHTML = ""
	
	elem = document.createElement('div')
	elem.setAttribute("id", "fjord-logo");
	//content = document.createTextNode("🗻 Fjord CMS")
	content = document.createElement('img')
	content.setAttribute("src", "https://media.licdn.com/dms/image/C4E0BAQGWWFp4CwjGcA/company-logo_100_100/0/1649795171880?e=2147483647&v=beta&t=jj8mDxUM7CThp0Mbqft0aX9HMWCFMCrjD_E2rPOt6GM");
	content.setAttribute("id", "fjord-logo-img");
	elem.append(content)
	content = document.createTextNode('FjordCMS')
	elem.append(content)
	wpadminbar.append(elem)
	//wp-login.php?action=logout
}