<?php
session_start(); // Start session

function updateNotificationSettings($dynamic, $daily, $weekly) 
{
    // Handle updating notification settings here
    
}

function changePhoneNumber($oldPhone, $newPhone, $password)
 {
    // Handle changing phone number here
   
}

function changePassword($oldPassword, $newPassword, $confirmPassword)
{
    // Handle changing password here

}

function deleteAccount($password, $confirmPassword) 
{
    // Handle deleting account here
   
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_notification_settings'])) {
        // Update Notification Settings form submitted
        $dynamic = isset($_POST['dynamic']) ? 1 : 0;
        $daily = isset($_POST['daily']) ? 1 : 0;
        $weekly = isset($_POST['weekly']) ? 1 : 0;
        updateNotificationSettings($dynamic, $daily, $weekly);
    } elseif (isset($_POST['change_phone_number'])) {
        // Change Phone Number form submitted
        $oldPhone = $_POST['old_phone'];
        $newPhone = $_POST['new_phone'];
        $password = $_POST['phone_password'];
        changePhoneNumber($oldPhone, $newPhone, $password);
    } elseif (isset($_POST['change_password'])) {
        // Change Password form submitted
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        changePassword($oldPassword, $newPassword, $confirmPassword);
    } elseif (isset($_POST['delete_account'])) {
        // Delete Account form submitted
        $password = $_POST['delete_password'];
        $confirmPassword = $_POST['confirm_delete_password'];
        deleteAccount($password, $confirmPassword);
    }
}
?>
