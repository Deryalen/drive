function EditNote(num)
{
	document.getElementById('mheader').innerHTML = document.getElementById('h'+num).innerHTML;
	document.getElementById('mnote').innerHTML = document.getElementById('n'+num).innerHTML;
	document.getElementById('refreshId').value = document.getElementById('id'+num).value;
}

function completeFields(){
	document.getElementById('refreshHeader').value = document.getElementById('mheader').innerHTML;
	document.getElementById('refreshNote').value = document.getElementById('mnote').innerHTML;
}

function createNote(){
	document.getElementById('newHeader').value = document.getElementById('cheader').innerHTML;
	document.getElementById('newNote').value = document.getElementById('cnote').innerHTML;
}

function moveToEnd(target) {
  var rng, sel;
    rng = document.createRange();
    rng.selectNodeContents(target);
    rng.collapse(false); // схлопываем в конечную точку
    sel = window.getSelection();
    sel.removeAllRanges();
    sel.addRange( rng );
}

function IsClear(key) {
	if (document.getElementById(key+'header').innerHTML.replace(/&nbsp;/g,"").trim()=="" && document.getElementById(key+'note').innerHTML.replace(/&nbsp;/g,"").replace(/<br>/g,"").trim()=="") {
		document.getElementById(key+'btn').disabled=true;
	}
	else{
		document.getElementById(key+'btn').disabled=false;
	}
}

$('div[id=cheader]').keydown(function(e) {
    
    if (e.keyCode == 13) {
      
      document.execCommand('insertHTML', false, '');
      $('div[id=cnote]').focus();
      moveToEnd($('div[id=cnote]')[0]);
      return false;
    }
  });

$('div[id=cnote]').keydown(function(e) {
    
    if (e.keyCode == 13) {
      
      document.execCommand('insertHTML', false, '<br><br>');
      return false;
    }
  });

$('div[id=mheader]').keydown(function(e) {
    
    if (e.keyCode == 13) {
      
      document.execCommand('insertHTML', false, '');
      $('div[id=mnote]').focus();
      moveToEnd($('div[id=mnote]')[0]);
      return false;
    }
  });

$('div[id=mnote]').keydown(function(e) {
    
    if (e.keyCode == 13) {
      
      document.execCommand('insertHTML', false, '<br><br>');
      return false;
    }
  });

$(document).ready(function(){
  $('#mnote').on('paste', function() {
    setTimeout(function(){
      var c = $('#mnote').html();
      var nc = strip_tags(c,'<br>'); 
      $('#mnote').html(nc);
    },100);
  });
});

$(document).ready(function(){
  $('#cnote').on('paste', function() {
    setTimeout(function(){
      var c = $('#cnote').html();
      var nc = strip_tags(c,'<br>'); 
      $('#cnote').html(nc);
    },100);
  });
});

$(document).ready(function(){
  $('#mheader').on('paste', function() {
    setTimeout(function(){
      var c = $('#mheader').html();
      var nc = strip_tags(c,'<br>'); 
      $('#mheader').html(nc);
    },100);
  });
});

$(document).ready(function(){
  $('#cheader').on('paste', function() {
    setTimeout(function(){
      var c = $('#cheader').html();
      var nc = strip_tags(c,'<br>'); 
      $('#cheader').html(nc);
    },100);
  });
});

function strip_tags(input, allowed) {

  allowed = (((allowed || '') + '')
    .toLowerCase()
    .match(/<[a-z][a-z0-9]*>/g) || [])
    .join('');
  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
  return input.replace(commentsAndPhpTags, '')
    .replace(tags, function($0, $1) {
      return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
    });
}