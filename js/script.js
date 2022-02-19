let update_date=document.getElementById('update_date');
let date=update_date.getAttribute('value');
let update_time= document.getElementById('update_time');
let time = update_time.getAttribute('value');
let h4_edit_appoinment=document.getElementById('edit_appoinments');
let div_id_edit_appoinment=h4_edit_appoinment.nextElementSibling.getAttribute('id');
console.log(div_id_edit_appoinment);

let privious_date=document.getElementById('privious_date').innerText;
console.log(privious_date);

let privious_time=document.getElementById('privious_time').innerText;
console.log(privious_time);


let update_status=document.getElementById('update_status');
let status=update_status.options[update_status.selectedIndex].value;
console.log(status);
update_appoinment={'appoinment_no':div_id_edit_appoinment, 'date':date, 'time':time, 'status':status, 'privious_time':"0", 'privious_date':"0" };
let update_appoin_localStorage_data=JSON.parse(localStorage.getItem("update_appoinments"));;
if(update_appoin_localStorage_data!=null){
  update_appoin_localStorage_data.push(update_appoinment);
}
else{
  update_appoin_localStorage_data=[];
  update_appoin_localStorage_data.push(update_appoinment);
}
console.log(update_appoin_localStorage_data)
localStorage.setItem("update_appoinments", JSON.stringify(update_appoin_localStorage_data))
let update_date_button=document.getElementById('update_date_button');
update_date_button.addEventListener('click', (e)=>{
    update_appoin_localStorage_data[0]['date']=update_date.value;
    update_appoin_localStorage_data[0]['privious_date']=privious_date;
    console.log(update_appoin_localStorage_data[0]['privious_date']);
    localStorage.setItem("update_appoinments", JSON.stringify(update_appoin_localStorage_data))
    //console.log(update_date.innerText);
});
let update_time_button=document.getElementById('update_time_button');
update_time_button.addEventListener('click', (e)=>{
    update_appoin_localStorage_data[0]['time']=update_time.value;
    update_appoin_localStorage_data[0]['privious_time']=privious_time;
    console.log(update_appoin_localStorage_data[0]['privious_time']);
    localStorage.setItem("update_appoinments", JSON.stringify(update_appoin_localStorage_data))
    //console.log(update_date.innerText);
});
let update_status_button=document.getElementById('update_status_button');
update_status_button.addEventListener('click', (e)=>{
    update_appoin_localStorage_data[0]['status']=update_status.options[update_status.selectedIndex].value;
    console.log(update_appoin_localStorage_data[0]['status']);
    localStorage.setItem("update_appoinments", JSON.stringify(update_appoin_localStorage_data))
    //console.log(update_date.innerText);
});

let apointment_update_save_button= document.getElementById('apointment_update_save_button');
apointment_update_save_button.addEventListener('click', (e)=>{
  update_appoin_localStorage_data=[];
  update_appoin_localStorage_data=JSON.parse(localStorage.getItem("update_appoinments"));
  console.log(JSON.stringify(update_appoin_localStorage_data));
  let ts=JSON.stringify(update_appoin_localStorage_data);
  // http://localhost/Aparler/partials/update_appoinments/_update_apoinments.php
  $.ajax({
    type:"POST",
    url: "partials/update_appoinments/_update_apoinments.php",
    data: ts,
    ContentType:"application/json",

    success:function(data){
        // alert('successfully posted');
        // console.log(data);
        localStorage.clear();
    },
    error:function(error){
      // console.log(error)
      //   alert('Could not be posted');
      localStorage.Clear();
    }

});
});

  

