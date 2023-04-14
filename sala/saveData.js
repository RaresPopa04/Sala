const saveBtn = document.getElementById("saveBtn");
const inputs  = document.querySelectorAll('input');
saveBtn.addEventListener('click',()=>
{
    const request =  new XMLHttpRequest();
    request.open("POST","save_data.php",true);
    request.onload = () => {
        if(request.readyState === XMLHttpRequest.DONE)
        {
            if(request.status === 200)
            {
                let data = request.response;
                    console.log(data);
            }
        }
    }
    let formData = new FormData();
    inputs.forEach(elem =>
        {
            formData.append(elem.name,elem.value)
        })
        for (const [key, value] of formData) {
           console.log(key,value);
          }
    request.send(formData);
})