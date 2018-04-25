<?php /* Template name: Register */
get_header(); 
?>
<?php if($_REQUEST['success']){?>
	Thank you for registering
<?php }else{?>
<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
<input type="hidden" name="action" value="newuser_form">
<input type="text" name="winda_id" id="winda"/><br/>
<input type="text" name="firstname" id="firstname" /><br/>
<input type="text" name="lastname" id="lastname" /><br/>
<input type="text" name="email" id="email_1" />
<input type="text" name="email2" id="email_2" />
<input type="text" name="tel" id="tel" />
<input type="text" name="mob" id="mob" />
<input type="text" name="address1" id="address1" />
<input type="text" name="address2" id="address2" />
<input type="text" name="town" id="town" />
<input type="text" name="postcode" id="postcode" />

<input type="file" name="medical_cert" />
<h2>Declaration</h2>
<p>Your personal information will be held and used in accordance with the Data Protection Act 1998. <br/>
CWIND Training will not disclose such information to any unauthorized person, or body, but where appropriate will use such information in carrying out various functions and services. <br/>
CWIND Training may also use the data in connection with the prevention or detection of fraud or other crime.
</p>
<h2>Medical Conditions</h2>
<p>
It should be understood that our courses, especially work at heights, involve a certain amount of physical and mental exertion. 
Certain medical conditions are definite contra-indications to safe and successful training. 
Candidates attending this course should therefore be able to demonstrate the appropriate medical fitness.
As a minimum we require you to sign this form to state that you are historically free of the conditions listed below, and therefor there is no reason to exclude you from participation in a training course. 
We may also request a copy of your current medical certificate or statement of medical fitness.
Please check the options below if you suffer or have ever suffered from any of the following conditions.
</p>
<ul>
<li>Heart related problems, including Pacemakers</li>
<li>Blood pressure disorders</li>
<li>Epilepsy / Fits / Blackouts or Nerve damage</li>
<li>Vertigo / Dizziness</li>
<li>Muscular / Skeletal disorders affecting mobility</li>
<li>Alcohol / Drug dependence</li>
<li>Psychiatric illness</li>
<li>Diabetes</li>
<li>Asthma / Respiratory problems</li>
<li>Significant fears of Heights / Water / Confined Spaces</li>
<li>Allergies</li>
</ul>
To my knowledge I do not suffer from any of the above, or any other condition that will affect my ability to participate in training

<input type="submit" name="submit" value="I agree to all of the above and wish to register" />
</form><?php } ?>
<?php get_footer(); ?>