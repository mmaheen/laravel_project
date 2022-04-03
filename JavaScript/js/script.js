//alert ('hello');

function ageinday(){
    var birthyear = prompt ("Whats your birthyear?");
    var ageindays = (2022 -birthyear)*365;
    var h1 = document.createElement('h1');
    var textanser = document.createTextNode('you are '+ ageindays + ' years old');
    h1.setAttribute('id', 'ageinday');
    h1.appendChild(textanser);
    document.getElementById('flex-box-result').appendChild(h1);
}

function reset(){
    document.getElementById('ageinday').remove();
}