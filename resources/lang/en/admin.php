<?php

use App\Models\UniversitySetting;

$university_settings = UniversitySetting::all()->first();

return [
    'welcome_back' => 'Welcome Back',
    'language' => 'Language',

    // General
    "home" => 'Home',
    "actions" => "Actions",
    "search" => "Search",
    "sure_delete" => "Are you sure to delete",
    "name" => "Name",
    "value" => "Value",
    "title" => "title",

    "title_ar" => "The name of the college in Arabic",
    "title_en" => "Name of the College in English",
    "title_fr" => "Faculty Name in French",
    "address_ar" => "College address in Arabic",
    "address_en" => "College address in English",
    "address_fr" => "Faculty Address in French",


    "status" => "Status",
    "register" => "register",
    "from" => "from",
    "to" => "to",
    "show" => "show",
    "Loading" => "Loading",
    "No results" => "No results",
    "Search" => "Search",
    "research" => "research",
    "download" => "download",
    "zero_records" => "No results",
    "copy" => "copy",
    "Print" => "Print",
    "Excel" => "Excel",
    "select" => "Select",
    "arabic" => "in Arabic",
    "english" => "in English",
    "france" => "in French",
    "import" => "Import",
    "export" => "Export",
    "latin" => "in Latin",
    "wait" => "Wait",
    "added_successfully" => "Added Successfully",
    "updated_successfully" => "Updated Successfully",
    "deleted_successfully" => "Deleted Successfully",
    "something_went_wrong" => "Something Went Wrong",
    "wrong" => "Wrong",
    "video" => 'Video',
    "videos" => 'Videos',
    "created_at" => "created at",
    "user" => "User",
    "users" => "Users",
    "student" => "Student",
    "students" => "Students",
    "students_types" => "students types",
    "student_type" => "student type",
    "autumnal" => "Autumnal",
    "fall" => "Fall",
    "facebook_link" => 'Facebook Link',
    "dashboard" => "Dashboard",
    "admin" => "Admin",
    "admins" => "Admins",
    "logout" => "Logout",
    "profile" => "Profile",
    "information" => "Information",
    "more information" => "More Information",
    "experience_year" => "Experience Year",
    "sub_desc" => "Sub Desc",
    "whatsapp_link" => "Whatsapp Link",
    "youtube_link" => "Youtube Link",
    "phone" => "Phone",
    "parts of the site" => "parts of the site",
    "Usage schedules" => "Usage schedules",
    "Ads section" => "Ads section",
    'Document requests' => "Document requests",
    'Document requests types' => "Document requests types",
    'Those concerned with evidence and diploma' => "Those concerned with evidence and diploma",
    'Diploma certificates' => "Diploma certificates",
    'Student documents' => "Student documents",
    "exam" => "Exam",
    "exams" => "Exams",
    "full_name" => "Full Name",
    "annual_programming" => "Annual Programming",
    "Reasons_for_redress" => "Reasons for Redress",
    "re_record_the_track" => 'Re Record The Track',
    "You_must_re_register" => "You must re-register to be able to access the platform",
    "this_process_is_extended" => "This Process Is Extended",
    "until_an_end" => "Students Point",
    "points" => "Points",
    "students_point" => "نقاط الطالب",
    "oldPassword" => "old Password",
    "repeatPassword" => "repeat Password",

    "certificate_name" => "All certificates",
    "update_degree" => "Update Degree",
    "updated_degree_successfully" => "Updated Degree Successfully",
    "the_entered_mark" => "The entered mark is greater than the exam mark",


    // Process Exam
    "process_exams" => "Process Exam",
    "attachment_file" => "Attachment File",
    "reason" => "Reason",
    "pdf" => "PDF",
    "request_status_is_new" => "Request status is new",
    "request_status_is_accepted" => "Request status is accepted",
    "request_status_is_refused" => "Request status is refused",
    "request_status_is_under_processing" => "Request status is Under Processing",
    "process_exam_students" => "Process Exam Students",
    "the_remedial_request_has_been_registered_successfully" => "The remedial request has been registered successfully",
    "You_are_only" => "You are only entitled to one request during the period of the catch-up session",



    // crud
    "add" => "addition ",
    "edit" => "amendment ",
    "delete" => "delete ",
    "update" => "update ",
    "close" => "Close ",
    "delete_confirm" => "Are you sure to delete ",

    // Deadlines
    "deadlines" => "Deadlines",
    "desc" => "Description",
    "deadline_date_start" => "Deadline Date Start",
    "deadline_date_end" => "Deadline Date End",
    "an_appointment" => "An Appointment",

    // Setting
    "setting" => "Setting",
    "settings" => "Settings",

    // Service
    "service" => "Service",
    "services" => "Services",

    // Internal Ad
    "ad" => "Ad",
    "ads" => "Website Ads",
    "internal_ads" => "Internal Ads",

    "time_ads" => "Time Ads",
    "url_ads" => "Url Ads",

    // Department
    "departments" => "tracts",
    "department" => "tract",
    "department_students" => "Student departments",

    // Department branch
    "branches" => "Branches",
    "branch" => "Branch",

    // Department branch users
    "Users_Branches" => "Students's Branches ",
    "User_Branch" => "Student's Branch ",
    "register_year" => "register_year",
    "branch_restart_register" => "branch_restart_register",
    "student_branch" => "student",
    "student_count_department" => "The number of students according to the tracks",


    // Category
    "category" => "Category",
    "categories" => "Categories",

    // sliders
    "sliders" => "sliders",
    "image" => "image",
    "stamp_logo" => "stamp logo",
    "images" => "Images",
    "description" => "description",

    //word
    "wordManager" => "Dean's speech",
    "word_role" => "job title",


    // pages
    "pages" => "Pages",
    "page" => "Page",
    "files" => "Files",
    "images" => "Images",

    // Video
    'video' => 'Video',
    'videos' => 'Videos',

    "background_image" => 'Background Image',
    "video_url" => "Video Url",

    // Presentation
    'presentation' => 'Presentation',
    'presentations' => 'Presentations page',
    'experience_year' => 'Experience Year',
    'type' => 'Type',


    'id' => 'User ID',
    'first_name' => 'family name',
    'last_name' => 'First name',
    'first_name_latin' => 'Last name in Athenian',
    'last_name_latin' => 'Personal name in Athenian',
    'job_id' => 'Job ID',
    'image_user' => 'Student image',
    'image_admin' => 'admin photo',
    'points' => 'Student points',
    'university_email' => 'university email',
    'identifier_id' => 'University ID',
    'national_id' => 'National ID',
    'national_number' => 'National number',
    'nationality' => 'nationality',


    'birthday_date' => 'birthday',

    'birthday_place' => 'birthplace',
    'city' => 'province',
    'address' => 'address',
    'user_status' => 'User status',
    'user_type' => 'User type',
    'This email has already been activated' => 'This email has already been activated',
    'This email is not activated. Do it through the link sent to the mail, or contact the administration' => 'This email is not activated. Do it through the link sent to the mail, or contact the administration',
    'Verify that the data is correct and try again' => 'Verify that the data is correct and try again',
    'university_register_year' => 'University enrollment year',
    'email' => 'login email',
    'password' => "password",
    'password_not_correct' => "password not correct",
    'password_new_not_correct' => "new password not match",
    'The_platform_is_in_maintenance' => "The platform is currently under maintenance, try again later !",
    'maintenance' => "maintenance mode",
    'add_user' => "Add Student",
    'add_admin' => "Add Admin",
    'action' => 'action',


    //create model user and admin
    'city_ar' => "the region in Arabic",
    'city_en' => "province in English",
    'city_fr' => "Region in French",
    'birthday_place_ar' => "birthplace in Arabic",
    'birthday_place_en' => "place of birth in English",
    'birthday_place_fr' => "place of birth in French",


    //button edit or add or close model
    "add_data" => "Add",
    "edit_model" => "Edit",
    "close_model" => "Close",
    "all_users" => "All Students",
    "all_admins" => "All Admins",


    //sidebar users and admins
    'users' => 'Users',

    // Group
    'group' => 'Group',
    'groups' => 'cohorts',

    'subject' => ' Add new subject',
    'subjects' => 'units',
    'unit' => 'separate',
    'units' => 'chapters',

    // Subject Student
    'subject_student' => 'Subject Student',
    'subject_students' => 'Subject Students',
    'year' => 'Year',
    'period' => 'Period',

    // Subject Unit Doctor
    'subject_unit_doctor' => 'Add a unit to the professor',
    'subject_unit_doctors' => 'Unit Doctors',

    // University Setting
    'university_setting' => 'University Setting',
    'university_settings' => 'Website Settings',

    // Subject Exam
    'subject_exam' => 'Subject Exam',
    'subject_exams' => 'Exams',
    'exam_date' => 'Exam Date',
    'exam_day' => 'Exam Day',
    'session' => "Session",
    'time_start' => 'Time Start',
    'time_end' => 'Time End',

    'normal' => 'Normal',
    'catch_up' => 'Catch Up',

    'normal' => 'Normality',
    'remedial' => 'remedial',


    // Subject Exam Student
    'subject_exam_student' => 'Exam recall',
    'subject_exam_students' => 'Exam Calls',
    'exam_code' => 'Exam Code',
    'section' => 'Section',


    'document_type_id' => 'Document Type',
    'document_type_add' => "Add Document",
    'document_name_ar' => "Document Name in Arabic",
    'document_name_en' => "Document name in English",
    'document_name_fr' => "Document name in French",
    'document_types' => 'Document Types',


    //Document
    'document_id' => "Document Request Id",
    'student_name' => "student's name",
    'identifier_id_student' => "University ID",
    'document_type' => 'Document Type',
    'withdraw_by_proxy' => "withdraw by proxy",
    'person_name' => "person_name",
    'national_id_of_person' => "National ID of the person assigned to him",
    'card_image' => "A copy of the national card of the person entrusted to him",
    'card_image_user' => "A copy of the national card ",
    'note' => "Note",
    'optional' => "optional",
    'order_success' => "The request has been added successfully",
    "orders" => "Orders",
    "order" => "Order",
    'request_date' => "request date",
    'pull_type' => "pull type",
    'pull_date' => "pull date",
    'pull_return' => "Return Date",
    'request_status' => 'Request status',
    'processing_request_date' => 'the date the request was processed',

    'add_document' => "Document Withdrawal Request",
    'all_documents' => 'All Document Requests',


    'accept' => "accept the request",
    'refused' => "Refused",
    'under_processing' => 'under_processing',

    "temporary" => "temporary withdrawal",
    "final" => "final draw",

    'withdraw_by_proxy_yes' => 'Yes',
    'withdraw_by_proxy_no' => "No",

    //Element
    'element' => 'element',
    'elements' => 'elements',

    // Process Degrees
    "process_degree" => "Process Degree",
    "process_degrees" => "Process Degrees",
    "process_degrees_admin" => "Process Degrees Admin",
    "student_degree_before_request" => "Student Degree Before Request",
    "student_degree_after_request" => "Student Degree After Request",
    "request_type" => "Request Type",
    "request_status" => "Request Status",
    "processing_date" => "Processing Date",
    "doctor" => "Doctor",
    "new" => "New",
    "accept" => "Accept",
    "refused" => "Refused",
    "under_processing" => "Under Processing",
    "absent" => "Absent",
    "paper_review" => "Paper Review",
    "reparation_request" => "Reparation Request",
    "edit_degree_student" => "Edit Degree Student",
    "exam_degree_actuel" => "Exam Degree Actuel",
    "The_students_grade_after_adjustment" => "The student's grade after adjustment",
    "the_score_has_been_modified_successfully" => "The Score Has Been Modified Successfully",

    // Subject Exam Student Result
    "subject_exam_student_results" => "Exam Results",
    "degree" => "Degree",
    "exam" => "Exam",
    "date_enter_degree" => "Date Enter Degree",
    "number_of_students" => "Number of Students",
    "number_of_doctors" => "Number of Doctors",


    //Certificates
    "diploma_id" => "diploma_id",
    "diploma_name" => "diploma name",
    "diploma_name_ar" => "Diploma name in Arabic",
    "diploma_name_en" => "diploma name in English",
    "diploma_name_fr" => "diploma name in French",
    "validation_year" => "validation year",
    "diploma_identifier_id" => "Student's university ID",
    "diploma_user" => "student's name",
    "diploma_created_at" => "diploma_created_at",
    "diploma_year" => "year of addition",
    "diploma add" => "Add a Certificate for a Student",
    "diploma all" => "All Diplomas",


    // data modification
    "data_modify" => "Data Modification",
    'first_name_ar' => 'first name in Arabic',
    'first_name_en' => 'first name in English',
    'first_name_fr' => 'first name in France',
    'last_name_ar' => 'last name in Arabic',
    'last_name_en' => 'last name in English',
    'last_name_fr' => 'last name in France',
    'new' => 'new',
    'accept' => 'accept',
    'refused' => 'refused',
    'under_processing' => 'under_processing',


    // Event
    'event' => 'Event',
    'events' => 'Events',


    "schedule_pdf_upload" => "time usage file",
    "group_name" => "group name",
    "department_name" => "department name",
    "department_branch_name" => "department name",
    "add_schedule" => "Add Schedule Usage",
    "all_schedules" => "schedules",
    "remedial" => "Remedial",

    'period_start_date' => 'period start date',
    'period_end_date' => 'period end date',
    'period_name' => 'period',
    'session_name' => "Session",
    'year_start' => "year of start",
    'year_end' => "year-end",
    'status_period' => 'period status',
    'period_add' => "Add a new period",
    'period_all' => 'all periods',
    'period finished' => "period finished",
    'group_choice' => "choose group",

    'subject_choice' => "subject choice",
    'for' => ' for the student ',
    'unit_name_lang' => "Unit name",

    'semester' => "Semester",
    'college_enrollment_certificate' => "College enrollment certificate ",
    'national' => "College enrollment certificate ",
    'dean_of_college_testifies' => "The dean of the college testifies '" . $university_settings->getTranslation('title', app()->getLocale()) . "' that student:",
    "registered_units" => "Registered units",

    'unit name' => 'class', 'description text' => 'notes',

    'result' => 'Subject results',


    "group_code" => "group_code",
    "department_code" => "department_code",
    "department_branch_code" => "department_branch_code",
    "unit_code" => "unit_code",


    "group_code_ar" => "group code in Arabic",
    "group_code_en" => "group code in English",
    "group_code_fr" => "group code in French",


    "department_code_ar" => "Department Code in Arabic",
    "department_code_en" => "department code in English",
    "department_code_fr" => "department code in French",


    "department_branch_code_ar" => "Department branch code Arabic",
    "department_branch_code_en" => "department branch code English",
    "department_branch_code_fr" => "department branch code french",


    "unit_code_ar" => "Unit Code in Arabic",
    "unit_code_en" => "Unit code English",
    "unit_code_fr" => "Unit code french",


    "situation_with_management" => "situation with management",
    "situation_with_treasury" => "situation with treasury",


    "description_situation_with_management" => "A note on the situation with management",
    "description_situation_with_management_ar" => "A note on the situation with management in Arabic",
    "description_situation_with_management_en" => "A Note on Situation with Management in English",
    "description_situation_with_management_fr" => "A note on situation with management in French",


    "description_situation_with_treasury" => "A note on the situation with the safe",
    "description_situation_with_treasury_ar" => "A note on the situation with the treasury in Arabic",
    "description_situation_with_treasury_en" => "A note on the situation with the treasury in English",
    "description_situation_with_treasury_fr" => "A note on the situation with the treasury in French",


    "pay" => "payable",
    "not_pay" => "not payable",


    "problem" => "there is a problem",
    "no_problem" => "no problem",
    "no_notes" => "there are no notes",

    // point statements
    "point statement" => "point statement",
    "code_latin" => "Code in Latin",
    "requests" => "requests",
    "all_requests" => "All requests for revision",


    "subject_name_" => "unit",
    "group_name_" => "cohort",
    "year_name_" => "academic year",
    "period_name_" => "period",


    "unit_name_" => "chapter",
    "doctor_name_" => "professor",
    "day_name_" => "today",
    "date_" => "date",
    "time_" => "time",
    "section_" => "hall",
    "exam_code_" => "Exam Code",
    "doctors" => "teachers",
    "add_advertisement" => "Add a new advertisement to the site",


    // web
    "digital platform" => "digital platform",
    "latest posts" => "latest posts",
    "details" => "details",
    "Contact Us" => "Contact Us",
    "welcome to" => "Welcome to",
    "College in numbers" => "College in numbers",
    "Total students" => "Total students",
    "Administrative crews" => "Administrative crews",
    "Educational crews" => "Educational crews",
    "vacation students" => "vacation students",
    "Master students" => "Master students",
    "PhD students" => "PhD students",
    "Digital Student Platform" => "Digital Student Platform",
    "Colleges Digital Platform" => "Colleges Digital Platform",
    "Colleges Digital Magazine" => "Colleges Digital Magazine",
    "department_branch_students" => "Students in course selection",
    "all_subject_students" => "Student Record in Units",
    "university_year" => "college year",
    "all_doctors" => "the teacher",

    "add_department_to_student" => "Add a course for a student",

    "remaining_days" => "Remaining Days",

    "our news" => "our news",
    "The latest news" => "The latest news",
    "our events" => "our events",
    "The latest events" => "The latest events",
    "share in" => "share in",
    "years of giving" => "years of giving",
    "reset_password" => "Change password",


    "counter" => "site management statistics",



];



