<p align="center">
    <h1>Loyiha qanday ishga tushuriladi?</h1>
</p>

<ol>
    <li>loyiha kod fayllari php serverining papkasiga clon qilib olinadi</li>
    <li>Terminal(command line)da loyiha joylashgan papkaga otiladi va <br><i>composer update</i><br> buyrug'i yoziladi. (composer buyruqlarini yurgazish uchun sizda <a href="https://getcomposer.org/download/">Composer</a> o'rnatilgan bo'lishi lozim!)</li>
    <li>Composer kerakli fayllarni (internetdan) yuklab olganidan keyin, terminalga <br><i>php init</i><br> buyrug'i yoziladi. 
    <br>Development uchun terminalga "0" ni yozib ENTER ni bosing, 
    <br>keyingi so'rovga uchun "yes" ni yozib ENTERni bosing</li>
    <li>MySQL serverida ixtiyoriy nom bilan(masalan: "findteacher") ma'lumotlar bazasi yaratiladi</li>
    <li>common/config/main-local.php faylini oching va "dbname" qiymatini "yii2advanced" dan ozingiz yaratgan ma'lumotlar bazasi nomi(masala: findteacher)ga ozgartiring.</li>
    <li>Terminalda loyiha joylashgan papkaga o'tib, <br><i>yii migrate</i><br>
    buyrug'ini yozing va ENTER ni bosing. Qo'shimcha sorovlar uchun terminalga "yes" ni yozib ENTER ni bosing</li>
    <li>Terminalda loyiha joylashgan papkaga o'tib, <br><i>yii migrate/up --migrationPath=@vendor/costa-rico/yii2-images/migrations</i><br>buyrug'ini yozing va ENTER ni bosing. Qo'shimcha sorovlar uchun terminalga "yes" ni yozib ENTER ni bosing</li>
    <li>Loyiha ishlashga tayyor!</li>
</ol>
