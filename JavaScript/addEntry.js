let clear = document.querySelector('input[type="reset"]');
let title = document.querySelector('input[name="title"]');
let details = document.querySelector('input[name="details"]');

function output(e){
    
    result = confirm("Are you sure?");
    if (!result){
        e.preventDefault();
    }else{
        window.location.href = "clearPreviewSession.php";
    }
    
}
clear.addEventListener('click', output);

let post = document.querySelector('input[type="submit"]');


function submit(e){
    if (title.value == "" && details.value == ""){
        e.preventDefault();
        title.style.backgroundColor = "red";
        details.style.backgroundColor = "red";
    }else if (title.value == ""){
        e.preventDefault();
        title.style.backgroundColor = "red";
    }else if (details.value == ""){
        e.preventDefault();
        details.style.backgroundColor = "red";
    }
}
post.addEventListener('click', submit);


