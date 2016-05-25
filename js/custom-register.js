function CheckPass()
{
	if (document.getElementById("pass2").value!=document.getElementById("pass1").value)
	{
		document.getElementById("pass2error").classList.remove("invisible");
		document.getElementById("pass2block").classList.remove("has-success");
		document.getElementById("pass2block").classList.add("has-error");
		document.getElementById("pass2er").classList.remove("hidden");
		document.getElementById("pass2ok").classList.add("hidden");
		document.getElementById("register").disabled = true;
	}
	else
	{
		document.getElementById("pass2error").classList.add("invisible");
		document.getElementById("pass2block").classList.add("has-success");
		document.getElementById("pass2block").classList.remove("has-error");
		document.getElementById("pass2er").classList.add("hidden");
		document.getElementById("pass2ok").classList.remove("hidden");
		document.getElementById("register").disabled = false;
	}
}

function CheckLength()
{
		if (document.getElementById("pass1").value.length<6)
	{
		document.getElementById("pass1error").classList.remove("invisible");
		document.getElementById("pass1block").classList.remove("has-success");
		document.getElementById("pass1block").classList.add("has-error");
		document.getElementById("pass1er").classList.remove("hidden");
		document.getElementById("pass1ok").classList.add("hidden");
		document.getElementById("register").disabled = true;
	}
	else
	{
		document.getElementById("pass1error").classList.add("invisible");
		document.getElementById("pass1block").classList.add("has-success");
		document.getElementById("pass1block").classList.remove("has-error");
		document.getElementById("pass1er").classList.add("hidden");
		document.getElementById("pass1ok").classList.remove("hidden");
	}
}

function ClearPass()
{
	
	document.getElementById("pass2").value="";
	document.getElementById("pass2error").classList.add("invisible");
	document.getElementById("pass2block").classList.remove("has-success");
	document.getElementById("pass2block").classList.remove("has-error");
	document.getElementById("pass2er").classList.add("hidden");
	document.getElementById("pass2ok").classList.add("hidden");
	
}

function DeleteError()
{
	document.getElementById("logerror").classList.add("invisible");
}