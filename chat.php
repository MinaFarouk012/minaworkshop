<?php include 'header.php'; 

$emp_name = $_SESSION['name'];

?>


<br />  

<!--Form Start-->
<div class = "container">   
  <div class = "col-md-2 ">  </div>          
  <div class = "col-md-8 col-md-offset-3 chat_box" id="chatbox">            
    <div class = "form-control messages_display"></div>     
    <br />            
    <div class = "form-group">            
      <input type = "text" class = "input_name form-control" value="<?php echo $emp_name; ?>" disabled />      
    </div>            
    <div class = "form-group">            
      <textarea class = "input_message form-control" placeholder = "Enter Message" rows="5"></textarea>     
    </div>            
    <div class = "form-group input_send_holder">        
      <input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />     
    </div>          
  </div>  
  <div class = "col-md-2 ">   </div>         

<!--form end-->
  
  <script type="text/javascript">     
  
// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

// Add API Key & cluster here to make the connection 
var pusher = new Pusher('25e0cc929c639cd3a5f6', {
    cluster: 'mt1',
    encrypted: true
});

// Enter a unique channel you wish your users to be subscribed in.
var channel = pusher.subscribe('test_channel');

// bind the server event to get the response data and append it to the message div
channel.bind('my_event',
    function(data) {
        //console.log(data);
        $('.messages_display').append('<p class = "message_item">' + data + '</p>');
        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />');
        $(".messages_display").scrollTop($(".messages_display")[0].scrollHeight);
    });

// check if the user is subscribed to the above channel
channel.bind('pusher:subscription_succeeded', function(members) {
    console.log('successfully subscribed!');
});

// Send AJAX request to the PHP file on server 
function ajaxCall(ajax_url, ajax_data) {
    $.ajax({
        type: "POST",
        url: ajax_url,
        //dataType: "json",
        data: ajax_data,
        success: function(response) {
            console.log(response);
        },
        error: function(msg) {}
    });
}

// Trigger for the Enter key when clicked.
$.fn.enterKey = function(fnc) {
    return this.each(function() {
        $(this).keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        });
    });
}

// Send the Message enter by User
$('body').on('click', '.chat_box .input_send', function(e) {
    e.preventDefault();

    var message = $('.chat_box .input_message').val();
    var name = $('.chat_box .input_name').val();

    // Validate Name field
    if (name === '') {
        bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');
    } 

  else if (message !== '') {
        // Define ajax data
        var chat_message = {
            name: $('.chat_box .input_name').val(),
            message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
        }
        //console.log(chat_message);
        // Send the message to the server passing File Url and chat person name & message
        ajaxCall('/work.loc/message.php', chat_message);

        // Clear the message input field
        $('.chat_box .input_message').val('');
        // Show a loading image while sending
        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block" disabled /> &nbsp;<img     src = "loading.gif" />');
    }
});

// Send the message when enter key is clicked
$('.chat_box .input_message').enterKey(function(e) {
    e.preventDefault();
    $('.chat_box .input_send').click();
}); 
</script>
</div>



<?php include 'footer.php'; ?>

