<?php
use App\Models\UniversitySetting;

$university_settings= UniversitySetting::all()->first();

return [
    'welcome_back' => 'Content de te revoir',
    'language' => 'Langue',

    // General
    "home" => 'Maison',
    "actions" => "Actions",
    "search" => "Recherche",
    "sure_delete" => "Êtes-vous sûr de vouloir supprimer",
    "name" => "Nom",
    "value" => "Value",

    "title" => "title",
    "title_ar" => "Le nom du collège en arabe",
    "title_en" => "Nom du Collège en anglais",
    "title_fr" => "Nom de la faculté en français",
    "address_ar" => "Adresse du collège en arabe",
    "address_en" => "Adresse du collège en anglais",
    "address_fr" => "Adresse de la faculté en français",


    "status" => "Statut",
    "register" => "Enregistrer",
    "from" => "Depuis",
    "to" => "Pour",
    "show" => "Montrer",
    "Loading" => "Chargement",
    "No results" => "Aucun résultat",
    "Search" => "Recherche",
    "research" => "Recherche",
    "zero_records" => "Aucun résultat",
    "copy" => "Copie",
    "Print" => "Imprimer",
    "download" => "télécharger",
    "Excel" => "Exceller",
    "select" => "sélect",
    "import" => "importer",
    "export" => "exporter",
    "arabic" => "en arabe",
    "english" => "En anglais",
    "france" => "en français",
    "latin" => "en latin",
    "created_at" => "créé à",
    "user" => "utilisateur",
    "users" => "utilisateurs",
    "student" => "étudiant",
    "students" => "étudiants",
    "students_types" => "types d'étudiants",
    "student_type" => "type d'étudiant",
    "autumnal" => "Automnal",
    "fall" => "Automne",
    "facebook_link" => 'lien_facebook',
    "select" => "Sélect",
    "wait" => "attendez",
    "added_successfully" => "Ajouté avec succès",
    "updated_successfully" => "Mis à jour avec succés",
    "deleted_successfully" => "Supprimé avec succès",
    "something_went_wrong" => "Quelque chose s'est mal passé",
    "wrong" => "Faux",
    "dashboard" => "Tableau de bord",
    "admin" => "Administrador",
    "admins" => "Administradores",
    "logout" => "Se déconnecter",
    "profile" => "Profil",
    "information" => "Information",
    "more information" => "Plus d'information",
    "experience_year" => "Année d'expérience",
    "sub_desc" => "Sous-Description",
    "whatsapp_link" => "Lien WhatsApp",
    "youtube_link" => "Lien Youtube",
    "phone" => "Téléphone",
    "parts of the site" => "parties du site",
    "Usage schedules" => "Horaires d'utilisation",
    "Ads section" => "Rubrique Annonces",
    'Document requests' => "Demandes de documents",
    'Document requests types' => "Types de demandes de documents",
    'Those concerned with evidence and diploma' => "Ceux concernés par la preuve et le diplôme",
    'Diploma certificates' => "Certificats de diplôme",
    'Student documents' => "Documents étudiants",
    "exam" => "Examen",
    "exams" => "Examens",
    "full_name" =>  "Nom et prénom",
    "annual_programming" => "Programmation annuelle",
    "Reasons_for_redress" => "Motifs de réparation",
    "until_an_end" => "Students Point",
    "points" => "Points",
    "oldPassword" => "ancien mot de passe",
    "repeatPassword" => "Répéter le mot de passe",
    "this_process_is_extended" => "Ce processus est étendu",
    "until_an_end" => "Jusqu'à la fin",

    "re_record_the_track" => 'Réenregistrer la piste',
    "You_must_re_register" => "Vous devez vous réinscrire pour pouvoir accéder à la plateforme",

    "certificate_name" => "Tous les certificats",
    "update_degree" => "Mettre à jour le diplôme",
    "updated_degree_successfully" => "Diplôme mis à jour avec succès",
    "the_entered_mark" => "La note saisie est supérieure à la note de l'examen",

    "confirm_the_track" => 'Confirm The Track',





    // crud
    "add" => "Ajout ",
    "edit" => "Amendement ",
    "delete" => "Supprimer ",
    "update" => "Nettre à jour ",
    "close" => "Fermer ",
    "delete_confirm" => "Êtes-vous sûr De Vouloir Supprimer ",

    // Deadlines
    "deadlines" => "Les échéances",
    "desc" => "Description",
    "deadline_date_start" => "Date Limite Début",
    "deadline_date_end" => "Date Limite Fin",
    "an_appointment" => "Un Rendez-Vous",

    // Setting
    "setting" => "Paramètre",
    "settings" => "Paramètres",

    // Service
    "service" => "Service",
    "services" => "Services",

    // Internal Ad
    "ad" => "Publicité",
    "ads" => "Annonces du site",
    "internal_ads" => "Annonces Internes",

    "date_ads" => "Moment de l'annonce",
    "url_ads" => "Lien Des Annonces",
    // Department
    "departments" => "Des Pistes",
    "department" => "Piste",
    "department_students" => "Départements étudiants",


    // Department branch
    "branches" => "Branches",
    "branch" => "Branche",

    // Department branch users
    "Users_Branches" => "Branches étudiantes",
    "User_Branch" => "Branche des étudiants",
    "register_year" => "année d'inscription",
    "branch_restart_register" => "registre de redémarrage de succursale",
    "department_restart_register" => "Réenregistrer la piste",
    "student_branch" => "étudiant",
    "student_count_department" => "Le nombre d'étudiants selon les filières",


    // Category
    "category" => "catégorie",
    "categories" => "catégories",

    // sliders
    "sliders" => "sliders",
    "image" => "image",
    "stamp_logo" => "stamp logo",
    "images" => "Images",
    "description" => "description",

    // word
    "wordManager" => "Discours du doyen",
    "word_role" => "titre d'emploi",


    // pages
    "pages" => "Pages",
    "page" => "Page",
    "files" => "des dossiers",
    "images" => "images",


    // Video
    'video' => 'Vidéo',
    'videos' => 'Vidéos',
    "background_image" => 'image de Fond',
    "video_url" => "URL de la vidéo",

    // Presentation
    'presentation' => 'présentation',
    'presentations' => 'Page des présentations',
    'experience_year' => 'Année d expérience',
    'type' => 'Taper',
    'id' => "ID de l'utilisateur",
    'first_name' => "prénom",
    'first_name' => 'nom de famille',
    'first_name_latin' => 'Nom de famille en athénien',
    'last_name_latin' => 'Nom personnel en athénien',
    'last_name' => 'Prénom',
    'job_id' => 'Identifiant du travail',
    'image_admin' => "photo d'administration",
    'points' => "Points étudiants",
    'university_email' => "courriel de l'université",
    'identifier_id' => "carte d'identité universitaire",
    'national_id' => "Carte d'identité",
    'national_number' => "Numéro national",
    'nationality' => "nationalité",

    'birthday_date' => 'anniversaire',

    'birthday_place' => "Lieu de naissance",
    'city' => "province",
    'address' => "adresse",
    'user_status' => "Statut de l'utilisateur",
    'user_type' => "Type d'utilisateur",
    'This email has already been activated' => 'Cet e-mail a déjà été activé',
    'This email is not activated. Do it through the link sent to the mail, or contact the administration' => 'Cet e-mail n\'est pas activé. Faites-le via le lien envoyé à l\'e-mail ou contactez l\'administration',
    'Verify that the data is correct and try again' => 'Vérifiez que les données sont correctes et réessayez',
    'university_register_year' => "Année d'inscription à l'université",
    'email' => "Pseudo email",
    'password' => "Mot de passe",
    'password_not_correct' =>  "mot de passe incorrect",
    'password_new_not_correct' =>  "le nouveau mot de passe ne correspond pas",
    'The_platform_is_in_maintenance' =>  "La plateforme est actuellement en maintenance, réessayez plus tard !",
    'maintenance' =>  "Mode de Maintenance",
    'add_user' => "Ajouter un étudiant",
    'add_admin' => "ajouter un administrateur",
    'action' => "Procédure",


    //create model user and admin
    'city_ar' => "la région en arabe",
    'city_en' => "province en anglais",
    'city_fr' => "Région en français",
    'birthday_place_ar' => "lieu de naissance en arabe",
    'birthday_place_en' => "lieu de naissance en anglais",
    'birthday_place_fr' => "lieu de naissance en français",


    //button edit or add or close model
    "add_data" => "ajouter",
    "edit_model" => "modifier",
    "close_model" => "fermer",
    "all_users" => "tous les utilisateurs",
    "all_admins" => "tous les administrateurs",

    //sidebar users and admins
    'users' => 'utilisateurs',
    // Group
    'group' => 'Groupe',
    'groups' => 'cohortes',


    'subject' => 'Ajouter un nouvel élément',
    'subjects' => 'unités',

    'unit' => 'séparé',
    'unites' => 'chapitres',

    // Subject Student
    'subject_student' => 'Sujet Étudiant',
    'subject_re' => 'Sujet d\'enregistrement',

    'subject_students' => 'Sujet Étudiants',
    'year' => 'Année',
    'period' => 'période',

    // Subject Unit Doctor
    'subject_unit_doctor' => 'Ajouter une unité au professeur',
    'subject_unit_doctors' => 'unité sujette',

    // University Setting
    'university_setting' => 'Cadre universitaire',
    'university_settings' => 'Paramètres site',

    // Subject Exam
    'subject_exam' => 'Subject Exam',
    'subject_exams' => 'Exams',
    'exam_date' => 'Exam Date',
    'exam_day' => 'Exam Day',
    'session' => "Session",
    'time_start' => 'Time Start',
    'time_end' => 'Time End',

    'normal' => 'Normal',
    'catch up' => 'rattraper',

    'normal' => 'Normality',
    'remedial' => 'remedial',


    // Subject Exam Student
    'subject_exam_student' => 'Rappel examen',
    'subject_exam_students' => 'Subject Exam Students',
    'exam_code' => 'Exam Code',
    'section' => 'Section',

    'document_type_id' => 'Type de document',
    'document_type_add' => "Ajouter un document",
    'document_name_ar' => "Nom du document en arabe",
    'document_name_en' => "Nom du document en anglais",
    'document_name_fr' => "Nom du document en français",
    'document_types' => 'Types de documents',


    //Documents
    'document_id' => "Identifiant de demande de document",
    'student_name' => "nom de l'étudiant",
    'identifier_id_student' => "Identifiant de l'université",
    'document_type' => 'Type de document',
    'withdraw_by_proxy' => "retirer par procuration",
    'person_name' => "nom_personne",
    'national_id_of_person' => "Identifiant national de la personne qui lui est attribuée",
    'card_image' => "Une copie de la carte nationale de la personne qui lui est confiée",
    'card_image_user' => "Une copie de la carte nationale",
    'note' => "Note",
    'optional' => "optional",
    'order_success' => "La demande a été ajoutée avec succès",
    "orders" => "ordres",
    "order" => "ordre",
    'request_date' => "date de la demande",
    'pull_type' => "type d'extraction",
    'pull_date' => "date d'extraction",
    'pull_return' => "Date de retour",
    'request_status' => 'Statut de la demande',
    'processing_request_date' => 'la date à laquelle la demande a été traitée',

    'add_document' => "Demande de retrait de document",
    'all_documents' => 'Toutes les demandes de documents',


    'accept' => "accepter la demande",
    'refused' => "Refusé",
    'under_processing' => 'under_processing',

    "temporary" => "retrait temporaire",
    "final" => "tirage final",


    'withdraw_by_proxy_yes' => 'Oui',
    'withdraw_by_proxy_no' => "Non",


    //Element
    'element' => 'élément',
    'elements' => 'éléments',

    // Process Degrees
    "process_degree" => "Process Degree",
    "process_degrees" => "Process Degrees",
    "process_degrees_admin" => "Gestion des diplômes",
    "student_degree_before_request" => "Diplôme d'étudiant avant la demande",
    "student_degree_after_request" => "Diplôme d'étudiant après demande",
    "request_type" => "type de demande",
    "request_status" => "État de la demande",
    "processing_date" => "Date de traitement",
    "doctor" => "Médecin",
    "doctor" => "Doctor",
    "new" => "Nouveau",
    "accept" => "Accepter",
    "refused" => "Refusé",
    "under_processing" => "En cours de traitement",
    "absent" => "Absent",
    "paper_review" => "Examen papier",
    "reparation_request" => "Demande de réparation",
    "edit_degree_student" => "Modifier l'étudiant diplômé",
    "exam_degree_actuel" => "Examen Diplôme Actuel",
    "The_students_grade_after_adjustment" => "La note de l'élève après ajustement",
    // Subject Exam Student Result
    "subject_exam_student_results" => "Examen Résultats",
    "degree" => "Degré",
    "exam" => "Examen",
    "date_enter_degree" => "Date Entrez le diplôme",
    "number_of_students" => "nombre d'étudiants",
    "number_of_doctors" => "nombre de médecins",
    "exam_degree" => "Diplôme d'examen",
    "the_score_has_been_modified_successfully" => "Le score a été modifié avec succès",


    //Certificates
    "diploma_id" => "diplôme_id",
    "diploma_name" => "nom du diplôme",
    "diploma_name_ar" => "Nom du diplôme en arabe",
    "diploma_name_en" => "nom du diplôme en anglais",
    "diploma_name_fr" => "nom du diplôme en français",
    "validation_year" => "année de validation",
    "diploma_identifier_id" => "Identifiant universitaire de l'étudiant",
    "diploma_user" => "nom de l'étudiant",
    "diploma_created_at" => "diploma_created_at",
    "diploma_year" => "année d'ajout",
    "diploma add" => "Ajouter un certificat pour un étudiant",
    "diploma all" => "Tous les diplômes",


    // Process Exam
    "process_exams" => "Examen de processus",
    "attachment_file" => "Fichier joint",
    "reason" => "Raison",
    "pdf" => "PDF",
    "request_status_is_new" => "L'état de la demande est nouveau",
    "request_status_is_accepted" => "Le statut de la demande est accepté",
    "request_status_is_refused" => "Le statut de la demande est refusé",
    "request_status_is_under_processing" => "Le statut de la demande est en cours de traitement",
    "process_exam_students" => "Processus d'examen des étudiants",
    "the_remedial_request_has_been_registered_successfully" => "La demande de réparation a été enregistrée avec succès",
    "You_are_only" => "Vous n'avez droit qu'à une seule demande pendant la période de la session de rattrapage",


    // data modification
    "data_modify" => "Modification des données",



    "schedule_pdf_upload" => "fichier d'utilisation du temps",
    "group_name" => "nom du groupe",
    "department_name" => "nom du département",
    "department_branch_name" => "nom du département",
    "add_schedule" => "Ajouter une utilisation d'horaire",
    "all_schedules" => "horaires",



    // Event
    'event' => 'Evénement',
    'events' => 'Événements',

    'first_name_ar' => 'prénom en arabe',
    'first_name_en' => 'prénom en anglais',
    'first_name_fr' => 'prénom en france',
    'last_name_ar' => 'nom de famille en arabe',
    'last_name_en' => 'nom de famille en anglais',
    'last_name_fr' => 'nom de famille en France',

    'new' => 'nouveau',
    'accept' => 'accepter',
    'refused' => 'refusé',
    'under_processing' => 'en cours de traitement',
    "remedial" => "correctif",


     'period_start_date' => 'date de début de période',
     'period_end_date' => 'date de fin de période',
     'period_name' => 'période',
     'session_name' => "Session",
     'year_start' => "année de début",
     'year_end' => "fin d'année",
     'status_period' => 'statut de la période',
     'period_add' => "Ajouter une nouvelle période",
     'period_all' => 'toutes les périodes',
    'period_finished' => "période terminée",

    'group_choice' => "choisir le groupe",

    'subject_choice' => "choix du sujet",
    'for' => " pour l'élève ",
    'unit_name_lang' => "Nom de l'unité",
    'semester' => "Semestre",
    'college_enrollment_certificate' => "Certificat d'inscription au collège",
    'national' => "Certificat d'inscription au collège",
    'dean_of_college_testifies' => "Le doyen du collège témoigne '".$university_settings->getTranslation('title', app()->getLocale())."' cet étudiant:",
    "registered_units" => "Unités nominatives",

    "unit_name" => 'classe',
    'description_text' => 'notes',

    'result' => 'Résultats unitaires',


    //الرموز
    "group_code" => "code_groupe",
    "department_code" => "code_departement",
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
    "point statement" => "déclaration ponctuelle",

    "code_latin" => "Code in Latin",
    "requests" => "Demandes",
    "all_requests" => "Toutes les demandes d'avis",


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
    "doctors" => "le professeur",
    "add_advertisement" => "Ajouter une nouvelle annonce au site",


     // web
     "digital platform" => "plateforme numérique",
     "latest posts" => "derniers articles",
     "details" => "détails",
     "Contact Us" => "Contactez-nous",
     "welcome to" => "BIENVENUE À",
    "College in numbers" => "Le collège en chiffres",
    "Total students" => "Nombre total d'étudiants",
    "Administrative crews" => "Equipes administratives",
    "Educational crews" => "Equipes pédagogiques",
    "vacation students" => "étudiants en vacances",
    "Master students" => "Étudiants en master",
    "PhD students" => "Doctorants",
    "Digital Student Platform" => "Plateforme étudiante numérique",
    "Colleges Digital Platform" => "Plateforme numérique des collège",
    "Colleges Digital Magazine" => "Magazine numérique des collège",
    "department_branch_students" => "Étudiants en cours de sélection",
    "all_subject_students" => "Fiche de l'élève en unités",
    "university_year" => "année universitaire",
    "all_doctors" => "l'enseignant",


    "add_department_to_student" => "Ajouter un cours pour un étudiant",
    "our news" => "nos actualités",
    "The latest news" => "Les dernières nouvelles",
    "our events" => "nos événements",
    "The latest events" => "Les derniers événements",
    "share in" => "partager dans",
    "years of giving" => "années de don",

    "remaining_days" => "jours restants",
    "reset_password" => "Modifier le mot de passe",
    "counter" => "statistiques de gestion du site",


];


