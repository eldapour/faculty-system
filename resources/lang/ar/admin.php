<?php

use App\Models\UniversitySetting;

$university_settings=UniversitySetting::all()->first();
return [
    'welcome_back' => 'مرحبا بعودتك',
    'language' => 'اللغة',

    // General
    "home" => "الرئيسية",
    "actions" => "العمليات",
    "search" => "بحث",
    "sure_delete" => "هل انت متأكد من حذف",
    "name" => "الاسم",
    "value" => "القيمة",
    "title" => "العنوان",


    "title_ar" => "اسم الكليه بالعربيه",
    "title_en" => "اسم الكليه بالانجليزيه",
    "title_fr" => "اسم الكليه بالفرنسيه",
    "address_ar" => "عنوان الكليه بالعربيه",
    "address_en" => "عنوان الكليه بالانجليزيه",
    "address_fr" => "عنوان الكليه بالفرنسيه",


    "status" => "الحالة",
    "register" => "سجل",
    "copy" => "نسخ",
    "Print" => "طباعة",
    "Excel" => "اكسيل",
    "from" => "من",
    "to" => "الى",
    "show" => "اظهار",
    "Loading" => "جاري التحميل",
    "download" => "تحميل",
    "No results" => "لا نتائج",
    "Search" => "للبحث",
    "research" => "بحث",
    "select" => "اختر",
    "zero_records" => "لا يوجد نتائج",
    "wait" => "انتظر",
    "added_successfully" => "تم الاضافة بنجاح",
    "updated_successfully" => "تم التعديل بنجاح",
    "deleted_successfully" => "تم الحذف بنجاح",
    "something_went_wrong" => "هناك خطأ ما",
    "wrong" => "خطأ",
    "import" => "استيراد",
    "export" => "تصدير",
    "video" => 'فيديو',
    "videos" => 'فيديوهات',
    "created_at"=> "تاريخ الاضافة",
    "arabic" => "بالعربية",
    "english" => "بالانجليزية",
    "france" => "بالفرنسية",
    "latin" => "بالاتينية",
    "user" => "مستخدم",
    "users" => "مستخدمين",
    "student" => "طالب",
    "students" => "طلاب",
    "students_types" => "أنواع الطلبة",
    "student_type" => "نوع الطالب",
    "autumnal" => "ربيعيه",
    "fall" => "خريفيه",
    "facebook_link" => 'رابط الفسيبوك',
    "dashboard" => "اللوحة الرئيسية",
    "admin" => "مشرف",
    "admins" => "مشرفين",
    "logout" => "تسجيل الخروج",
    "profile" => "الملف الشخصي",
    "information" => "المعلومات",
    "more information" => "معلومات اضافية",
    "experience_year" => "سنين الخبرة",
    "sub_desc" => "وصف فرعي",
    "whatsapp_link" => "رابط الواتساب",
    "youtube_link" => "رابط اليوتيوب",
    "phone" => "رقم الهاتف",
    "parts of the site" => "اجزاء الموقع",
    "Ads section" => "قسم الاعلانات",
    'Those concerned with evidence and diploma' => "المعنيون بالشواهد والدبلوم",
    'Diploma certificates' => "شواهد الدبلومات",
    'Student documents' => "طلبات الوثائق",
    "exam" => "امتحان",
    "exams" => "امتحانات",
    "full_name" =>  "الاسم الكامل",
    "annual_programming" => "البرمجة السنوية",
    "Reasons_for_redress" => "أسباب الاستدراك",
    "students_point" => "نقاط الطالب",
    "points" => "نقاط",
    "oldPassword" => "كلمة السر القديمة",
    "repeatPassword" => "تاكيد كلمة السر",

    "certificate_name" => "جميع الشهادات",
    "update_degree" => "تعديل العلامة",
    "updated_degree_successfully" => "تم تعديل العلامة بنجاح",
    "the_entered_mark" => "العلامة المدخلة اكبر من علامة الامتحان",

    "re_record_the_track" => 'اعادة تسجيل المسار',







    // crud
    "add" => "اضافة ",
    "edit" => "تعديل ",
    "delete" => "حذف ",
    "update" => "تحديث ",
    "close" => "اغلاق ",
    "delete_confirm" => "هل انت متاكد من حذف ",



    // Deadlines
    "deadlines" => "المواعيد النهائية",
    "desc" => "الوصف",
    "deadline_date_start" => "بدايه الموعد",
    "deadline_date_end" => "نهايه الموعد",
    "an_appointment" => "موعد",

    // Setting
    "setting" => "اعداد",
    "settings" => "اعدادات",

    // Service
    "service" => "مصلحة",
    "services" => "مصالح",

    // Internal Ad
    "ad" => "اعلان",
    "ads" => "اعلانات الموقع",
    "internal_ads" => "اعلانات داخلية",
    "date" => "تاريخ",
    "time_ads" => "توقيت الاعلان",
    "url_ads" => "رابط الاعلان",

    // Department
    "departments" => "المسالك",
    "department" => "المسلك",
    "department_students" => "مسالك الطلبة",


    // Department branch
    "branches" => "المسارات",
    "branch" => "المسار",

    // Department branch users
    "Users_Branches" => "مسالك الطلاب",
    "User_Branch" => "مسلك الطالب",
    "register_year" => "سنة التسجيل",
    "branch_restart_register" => "إعادة تسجيل المسار",
    "department_restart_register" => "إعادة تسجيل المسلك",
    "student_branch" => "الطالب",
    "You_must_re_register" => "يجب عليك اعادة التسجيل لتستطيع الدخول الى المنصة",
    "this_process_is_extended" => "هذه العملية ممتدة من ",
    "until_an_end" => "الى غاية",
    "student_count_department" => "اعداد الطلبة حسب المسالك",


    // Category
    "category" => "قسم الموقع",
    "categories" => "اقسام الموقع",


    // sliders
    "sliders" => "صور متحركة",
    "image" => "الصورة",
    "stamp_logo" => "ختم المؤسسة",
    "images" => "الصور",
    "description" => "التفاصيل",

    // word
    "wordManager" => "كلمة العميد",
    "word_role" => "الصفة",

    // pages
    "pages" => "الصفحات",
    "page" => "الصفحة",
    "files" => "الملفات",


    "background_image" => 'خلفية الصورة',
    "video_url" => "رابط الفيديو",

    // Presentation
    'presentation' => 'عرض تقديمي',
    'presentations' => 'صفحه التقديم',
    'type' => 'نوع',

    // Group
    'group' => 'فوج',
    'groups' => 'الافواج',

    'subject' => 'اضافه وحده',
    'subjects' => 'وحدات',
    'unit' => 'فصل',
    'units' => 'فصول',



    //start translate model user and admin
    'id' => 'رمز المستخدم',
    'first_name' => 'الاسم العائلي',
    'last_name' => 'الاسم الشخصي',
    'first_name_latin' => 'الاسم العائلي بالاثينيه',
    'last_name_latin' => 'الاسم الشخصي بالاثينيه',
    'image_user' => 'صوره الطالب',
    'image_admin' => 'صوره الادمن',
    'points' => 'نقاط الطالب',
    'university_email' => 'البريد الجامعي',
    'identifier_id' => 'رقم الكارنيه الجامعي',
    'national_id' => 'رقم الوطني للبطاقه',
    'national_number' => 'الرقم الوطني',
    'nationality' => 'الجنسيه',
    'birthday_date' => 'تاريخ الازدياد',
    'birthday_place' => 'مكان الازدياد',
    'city' => 'اقليم الازدياد',
    'address' => 'مكان',
    'job_id' => "رقم التاجير",
    'This email has already been activated' => 'هذا الايميل مفعل من قبل',
    'This email is not activated. Do it through the link sent to the mail, or contact the administration' => 'لم يتم تنشيط هذا البريد الإلكتروني. قم بذلك من خلال الرابط المرسل إلى البريد ، أو تواصل مع الإدارة',
    'Verify that the data is correct and try again' => 'تاكد من صحة البيانات وحاول مرة اخري',
    'user_status' => 'حاله المستخدم',
    'user_type' => 'نوع المستخدم',
    'university_register_year' => 'سنه الالتحاق بالجامعه',
    'email' => 'البريد الالكتروني للدخول',
    'password' =>  "كلمه السر",
    'password_not_correct' =>  "كلمة المرور غير صحيحة",
    'The_platform_is_in_maintenance' =>  "المنصة في طور الصيانة الان حاول في وقت لاحق !",
    'maintenance' =>  "وضع الصيانة",
    'password_new_not_correct' =>  "كلمة المرور الجديدة غير متطابقة",
    'add_user' => "اضافه طالب",
    'add_admin' => "اضافه ادمن",
    'action' => 'اجراء',



    //create model user and admin
    'city_ar' => "اقليم الازدياد باللغه العربيه",
    'city_en' => "اقليم الازدياد باللغه الانجليزيه",
    'city_fr' => "اقليم الازدياد باللغه الفرنسيه",
    'birthday_place_ar' => "مكان الازدياد باللغه العربيه",
    'birthday_place_en' => "مكان الازدياد باللغه الانجليزيه",
    'birthday_place_fr' => "مكان الازدياد باللغه الفرنسيه",


    //button edit or add or close model

    "add_data" => "اضافه",
    "edit_model" => "تعديل",
    "close_model" => "اغلاق",
    "all_users" => "جميع الطلبه",
    "all_admins" => "جميع الادمن",


    // Subject Student
    'subject_student' => 'طالب المادة',
    'subject_re' => 'وحدات التسجيل',

    'subject_students' => 'وحدات الطالب',
    'year' => 'سنة',
    'period' => 'فترة',

    // Subject Unit Doctor
    'subject_unit_doctor' => 'اضافه وحده للاستاذ',
    'subject_unit_doctors' => 'وحدات الاستاذ',

    // University Setting
    'university_setting' => 'اعداد الجامعة',
    'university_settings' => 'اعدادات الموقع',

    // Subject Exam
    'subject_exam' => 'امتحان المادة',
    'subject_exams' => 'الامتحانات',
    'exam_date' => 'تاريخ الامتحان',
    'exam_day' => 'يوم الامتحان',
    'session' => "الدورة",
    'time_start' => 'وقت البدء',
    'time_end' => 'وقت النهاية',
    'catch_up' => 'استدراكية',
    'normal' => 'عادية',




    // Subject Exam Student
    'subject_exam_student' => 'استدعاء الامتحان',
    'subject_exam_students' => 'استدعاء الامتحان',
    'exam_code' => 'رمز الامتحان',
    'section' => 'قاعة',



    //document types
    'document_type_id' => "رمز الوثيقه",
    'document_type_add' => "اضافه وثيقه",
    'document_name_ar' => "اسم الوثيقه باللغه العربيه",
    'document_name_en' => "اسم الوثيقه باللغه الانجليزيه",
    'document_name_fr' => "اسم الوثيقه باللغه الفرنسيه",
    'document_types' => "انواع الوثائق",



    //Documents
    'document_id' => "رمز طلب الوثيقه",
    'student_name' => "اسم الطالب",
    'identifier_id_student' => "رقم الكارنيه الجامعي",
    'document_type' => "نوع الوثيقه",
    'withdraw_by_proxy' => "سحب بالوكاله",
    'person_name' => "اسم الموكل اليه",
    'national_id_of_person' => "رقم البطاقه الوطنيه للموكل اليه",
    'card_image' => "صوره البطاقه الوطنيه للموكل اليه",
    'card_image_user' => "صوره البطاقه الوطنيه ",
    'note' => "ملاحظات",
    'optional' => "اختياري",
    "order_success" => "تم اضافة الطلب بنجاح",
    "orders" => "الطلبات",
    "order" => "الطلب",
    'request_date' => "تاريخ الطلب",
    'pull_type' => "نوع السحب",
    'pull_date' => "تاريخ السحب",
    'pull_return' => "تاريخ الارجاع",
    'processing_request_date' => "تاريخ معالجه الطلب",

    'add_document' => "طلب سحب وثيقه",
    'all_documents' => "جميع طلبات الوثائق",
    'Document requests' => " طلبات الوثائق",
    'Document requests types' => "انواع طلبات الوثائق",


    'accept' => "قبول الطلب",
    "temporary" => "سحب مؤقت",
    "final" => "سحب نهائي",


    'withdraw_by_proxy_yes' => "نعم",
    'withdraw_by_proxy_no' => "لا",

    //Element
    'element' => 'العنصر البيداغوجي',
    'elements' => 'العنصر البيداغوجي',

    // Process Degrees
    "process_degree" => "درجة العملية",
    "process_degrees" => "طلب معالجه نقطه",
    "process_degrees_admin" => "ادارة طلب معالجة النقطة" ,
    "student_degree_before_request" => "درجة الطالب قبل الطلب",
    "student_degree_after_request" => "درجة الطالب بعد الطلب",
    "request_type" => "نوع الطلب",
    "request_status" => "حالة الطلب",
    "processing_date" => "تاريخ المعالجة",
    "doctor" => "الاستاذ",
    "new" => "جديد",
    "refused" => "مرفوض",
    "absent" => "غائب",
    "paper_review" => "مراجعة الورقة",
    "reparation_request" => "طلب جبر",
    "edit_degree_student" => "تعديل درجة الطالب",
    "exam_degree_actuel" => "درجة الطالب الحالية",
    "The_students_grade_after_adjustment" => "درجة الطالب بعد التعديل",
    "exam_degree" => "درجة الامتحان",
    "the_score_has_been_modified_successfully" => "تم تعديل الدرجة بنجاح",


    // Subject Exam Student Result
    "subject_exam_student_results" => "نتائج الامتحانات",
    "degree" => "درجة",
    "exam" => "امتحان",
    "date_enter_degree" => "تاريخ ادخال النتيجة",
    "number_of_students" => "عدد الطلاب",
    "number_of_doctors" => "عدد الدكاترة",


    //Certificates
    "diploma_id" => "رمز الشهاده",
    "diploma_name" => "اسم الشهاده",
    "diploma_name_ar" => "اسم الشهاده باللغه العربيه",
    "diploma_name_en" => "اسم الشهاده باللغه الانجليزيه",
    "diploma_name_fr" => "اسم الشهاده باللغه الفرنسيه",
    "validation_year" => "سنه الاستيفاء",
    "diploma_identifier_id" => "رقم الكارنيه الجامعي للطالب",
    "diploma_user" => "اسم الطالب",
    "diploma_created_at" => "وقت الاضافه",
    "diploma_year" => "سنه الاضافه",
    "diploma_add" => "اضافه شهاده لطالب",
    "diploma_all" => "جميع شهادات الدبلومات",

    // Process Exam
    "process_exams" => "طلبات الاستدراك",
    "remedial" => "استدراكية",
    "attachment_file" => "ملف مرفق",
    "reason" => "السبب",
    "pdf" => "ملف ورقي",
    "request_status_is_new" => "حالة الطلب جديدة",
    "request_status_is_accepted" => "حالة الطلب مقبولة",
    "request_status_is_refused" => "تم رفض حالة الطلب",
    "request_status_is_under_processing" => "حالة الطلب قيد المعالجة",
    "process_exam_students" => "تقديم طلب استدراك",
    "the_remedial_request_has_been_registered_successfully" => "تم تسجيل طلب الاستدراك بنجاح",
    "You_are_only" => "لا يحق لك غير طلب واحد خلال مدة الدورة الاستدراكية",


    // data modification
    "data_modify" => "طلب تعديل البيانات",

    'last_name' => 'الاسم العائلي',
    'first_name' => 'الاسم الشخصي',
    'last_name_latin' => 'الاسم العائلي بالاثينية',
    'first_name_latin' => 'الاسم الشخصي بالاثينية',
    'national_id' => 'رقم البطاقة الوطنية/جواز السفر',
    'birthday_date' => 'تاريخ الازدياد',
    'birthday_place' => 'مكان الازدياد',
    'city_ar' => 'إقليم الازدياد',
    'city_latin' => 'إقليم الازدياد بالاثينية',
    'address' => 'العنوان',
    'country_address_latin' => 'اقليم العنوان',


    'under_processing' => 'قيد المراجعة',


    // Event
    'event' => 'حدث',
    'events' => 'الاحداث',



    "schedule_pdf_upload" => "ملف استعمال الزمن",
    "group_name" => "اسم الفوج",
    "department_name" => "اسم المسلك",
    "department_branch_name" => "اسم المسار",
    "add_schedule" => "اضافه جدول استعمال زمن",
    "all_schedules" => "جداول الاستعمالات الزمنيه",
    "Usage schedules" => "استعمالات الزمن",



    //periods
    'period_start_date' => "تاريخ بدايه الفتره",
    'period_end_date' => "تاريخ نهايه الفتره",
    'period_name' => "الفتره",
    'session_name' => "الدوره",
    'year_start' => "سنه البدايه",
    'year_end' => "سنه النهايه",
    'status_period' => "حاله الفتره",
    'period_add' => "اضافه فتره جديده",
    'period_all' => "جميع الفترات",
    'period_finished' => "انهاء الفتره",


    'group_choice' => "اختر الفوج",
    'subject_choice' => "اختر الوحده",
    'for' => " للطالب ",
    'unit_name_lang' => "اسم الوحده",
    'semester' => "الفصل الدراسي",
    'college_enrollment_certificate' => "شهادة التسجيل بالكلية",
    'national' => "شهادة التسجيل بالكلية",
    'dean_of_college_testifies' => "يشهد عميد الكلية '".$university_settings->getTranslation('title', app()->getLocale())."' أن الطالب:",
    "registered_units" => "الوحدات المسجل بها ",


    'unit_name' => "الفصل لدراسي",
    'description_text' => "ملاحظات",

    'result' => 'نتائج الوحده',


    //الرموز
    "group_code" => "رمز الفوج",
    "department_code" => "رمز المسلك",
    "department_branch_code" => "رمز المسار",
    "unit_code" => "رمز الفصل",



    "group_code_ar" => "رمز الفوج باللغه العربيه",
    "group_code_en" => "رمز الفوج باللغه الانجليزيه",
    "group_code_fr" => "رمز الفوج باللغه الفرنسيه",


    "department_code_ar" => "رمز المسلك باللغه العربيه",
    "department_code_en" => "رمز المسلك باللغه الانجليزيه",
    "department_code_fr" => "رمز المسلك باللغه الفرنسيه",


    "department_branch_code_ar" => "رمز المسار باللغه العربيه",
    "department_branch_code_en" => "رمز المسار باللغه الانجليزيه",
    "department_branch_code_fr" => "رمز المسار باللغه الفرنسيه",


    "unit_code_ar" => "رمز الفصل باللغه العربيه",
    "unit_code_en" => "رمز الفصل باللغه الانجليزيه",
    "unit_code_fr" => "رمز الفصل باللغه الفرنسيه",




    "situation_with_management" => "الوضعيه مع الاداره",
    "situation_with_treasury" => "الوضعيه مع الخزانه",


    "description_situation_with_management" => "ملاحظه علي الوضعيه مع الاداره",
    "description_situation_with_management_ar" => "ملاحظه علي الوضعيه مع الاداره باللغه العربيه",
    "description_situation_with_management_en" => "ملاحظه علي الوضعيه مع الاداره باللغه الانجليزيه",
    "description_situation_with_management_fr" => "ملاحظه علي الوضعيه مع الاداره باللغه الفرنسيه",


    "description_situation_with_treasury" => "ملاحظه علي الوضعيه مع الخزانه",
    "description_situation_with_treasury_ar" => "ملاحظه علي الوضعيه مع الخزانه باللغه العربيه",
    "description_situation_with_treasury_en" => "ملاحظه علي الوضعيه مع الخزانه باللغه الانجليزيه",
    "description_situation_with_treasury_fr" => "ملاحظه علي الوضعيه مع الخزانه باللغه الفرنسيه",


    "pay" => "قابل للدفع",
    "not_pay" => "غير قابع للدفع",


    "problem" => "يوجد مشكله",
    "no_problem" => "لا يوجد مشكله",
    "no_notes" => "لا يوجد ملاحظات",

    // point statements
    "point statement" => "بيان النقط",
    "code_latin" => "الكود بالاتينيه",
    "requests" => "الطلبات",
    "all_requests" => "جميع طلبات المراجعة",



    //helper
    "subject_name_" => "الوحده",
    "group_name_" => "الفوج",
    "year_name_" => "السنه الدراسيه",
    "period_name_" => "الفتره",

    "unit_name_" => "الفصل",
    "doctor_name_" => "الاستاذ",
    "day_name_" => "اليوم",
    "date_" => "التاريخ",
    "time_" => "التوقيت",
    "section_" => "القاعه",
    "exam_code_" => "رقم الامتحان",
    "doctors" => "الاستاذه",

    "add_advertisement" => "اضافه اعلان جديد للموقع",

    // web
    "digital platform" => "المنصات الرقمية",
    "latest posts" => "آخر المشاركات",
    "details" => "التفاصيل",
    "Contact Us" => "اتصل بنا",
    "welcome to" => "مرحبا بكم في ",
    "College in numbers" => "الكلية في أرقام",
    "Total students" => "مجموع الطلاب",
    "Administrative crews" => "الأطقم الإدارية",
    "Educational crews" => "أطقم تعليمية",
    "vacation students" => "طلاب إجازة",
    "Master students" => "طلاب الماجستير",
    "PhD students" => "طلاب الدكتوراه",
    "Digital Student Platform" => "منصة الطالب الرقمية",
    "Colleges Digital Platform" => "الخزانة الرقمية للكلية",
    "Colleges Digital Magazine" => "مجلة الكلية الرقمية",
    "department_branch_students" => "المعنيون باختيار المسار",
    "all_subject_students" => "سجل الطالب بالوحدات",
    "university_year" => "السنه الجامعيه",
    "all_doctors" => "الاستاذه",

    "add_department_to_student" => "اضافه مسار للطالب",

   "remaining_days" => "الايام المتبقيه",

    "our news" => "أخبارنا",
    "The latest news" => "آخر الأخبار",
    "our events" => "أحداثنا",
    "The latest events" => "آخر الأحداث",
    "share in" => "المشاركة في",
    "years of giving" => "سنوات من العطاء",
    "reset_password" => "تغيير كلمه المرور",

    "counter" => "احصائيات الاداره في الموقع",
    "internal_ads" => "الاعلانات الداخلية"





];

