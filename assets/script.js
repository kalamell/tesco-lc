var timeout = null;

$(document).on('mousemove', function() {
    clearTimeout(timeout);

    timeout = setTimeout(function() {
        window.top.location.href  = b_url+'/auth/logout';
    }, 600000);
});

checkUser();
setInterval(function() {
	checkUser();
}, 60000);


function checkUser()
{
	// api user get
	var token = JSON.parse(window.localStorage.getItem('token'));
	var user = JSON.parse(window.localStorage.getItem('user'));
	 $.ajax({
        url: 'https://backend.tescolotuslc.com/learningcenter/api/user/report',
		headers: {
		    "Content-Type": "application/x-www-form-urlencoded",
		},
		method: 'POST',
		data: {
		    user_id: user.user_id,
		    token: token,
		},
		success: function(res) {
		    if (res.status == false) {
		    	//window.top.location.href  = b_url+'/auth/logout';
		    }
		} 
	})
}