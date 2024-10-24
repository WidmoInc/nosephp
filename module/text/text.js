/* A simple content module for loading a local text file */
function text_menuitem(args) {
  return "javascript:text_load('"+args+"');";
}

function text_display(content) {
  $('#contentArea').html("<pre>"+content+"</pre>");
}
function text_load(file) {
  // File may or may not be contained in a JSON string and array. Strip uneeded characters
  file = file.replace(/"/g,'');
  file = file.replace(/\[/g,'');
  file = file.replace(/\]/g,'');

  //sanitise file to prevent it reaching parent directory
  file = file.replace("..",'');

  //do pushState before we add the folder name
  pushStateWithoutDuplicate(file, './?p=text/'+file);

  //if hostname is set, check the correct folder for content
  if(hostname != '') file = hostname+'/'+file;

  $.ajax({
      type: 'GET',
      url: "content/"+file
  }).done(text_display);
}
function text_permlink(permlink) {
  permlink = permlink.join("/");
  text_load(permlink);
}
