<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Validation Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines contain the default error messages used by
      | the validator class. Some of these rules have multiple versions such
      | as the size rules. Feel free to tweak each of these messages here.
      |
     */

    'password_incorrect' => 'The :attribute is incorrect.',
    'login_failed' => "Login Failed",
    'validation_failed' => 'Validation Failed',
    'successful_updated' => 'Successfully updated :argument',
    "you_cant_edit_super_admin" => "You cant edit super administrator",
    "locked" => "Locked",
    "error" => "Error :argument",
    "error_user_doesnt_exist" => "User doesnt exist.",
    "you_cant_delete_super_administrator" => "You cant delete super administrator",
    'you_cant_update_role_user_super_administrator' => 'You cant update user role :user to super administrator',
    "success_deleted" => "Succsessfully deleted :argument",
    "success_deleted_permanently" => "Successfully permanently deleted :argument",
    "success_add_user" => "User :argument created sucessfully.",
    "success_add_category" => "Category :argument created successfully",
    "success_add_album" => "Album :argument created successfully",
    "success_add_gallery" => "Gallery :argument created successfully",
    "error_category_doesnt_exist" => "Category id :argument doesnt exists",
    "error_image_doesnt_exist" => "Image id :argument doesnt exists",
    "error_album_doesnt_exist" => "Album doesnt exists",
    "are_you_sure" => [
        "delete_category" => "Are you sure you want to delete category ?",
        "delete_category_description" => "Deleting this category means will also delete the post that are on this category.",
        "delete_post" => "Are you sure you want to delete post ?",
        "delete_post_description" => "Delete this post",
        "delete_post_permanently" => "Are you sure you want to delete this post ?",
        "delete_post_description_permanently" => "Delete this post means you will delete it permanently and cannot be restored",
        "delete_image" => "Are you sure you want to delete image ?",
        "delete_album" => "Are you sure you want to delete this album ?",
        "delete_gallery" => "Are you sure you want to delete this gallery?",
        "edit_gallery" => "Are you sure you want to edit this gallery ?",
        "edit_image" => "Are you sure you want to edit image ?",
    ],
    "post" => [
        "add_post_successful" => "Post :argument created successfully ",
    ],
    "error_gallery_doesnt_exist" => "Gallery doesnt exists",
    "error_album_doesnt_exist" => "Album doesnt exists",
];
