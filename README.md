<div dir="rtl">
<a href="#"><img src="https://i.ibb.co/r203QFc/school-management-erp-1558416373-4916185.png" alt="school-management-erp-1558416373-4916185" border="0" /></a>
<p align="center">

# عن نظام إدارات المدارس

نظام إدارة المدارس المتكامل، يهتم بالنظام الإداري من حيث إدارة المعلمين والصفوف والطلاب والرسوم والمكتبة و الامتحانات وغيرها من العمليات.

#نسخة لتجربة
[هذا الرباط](https://fh32000.com/sms).يمكنك الاطلاع على نسخه من النظام من

- معلومات الدخول على النسخة التجريبية

| نوع الحساب  | الايميل | كلمة المرور |
| ------------- |  ----- | -------- |
| ادمن | admin@admin.com | 123456789 |

### من بناء هذا النظام
تم بناء هذا المشروع بواسطة الاستاذ @Samir-Gamal

وله قناه على اليوتيوب يشرح فيه إنشاء واستخدام هذا المشروع
شكرا على مجهوده الطيب وبارك الله في عمله

- [@youtube](https://www.youtube.com/watch?v=zKVIM-lnauo&list=PLftLUHfDSiZ7-RAsH8NskS7AYofykW_WN).

## طريقة تشغيل المشروع للمطورين
1. Clone the repo تحميل المستودع
```sh
  git clone git@github.com:Samir-Gamal/school-management-system.git
```
2. Install dependencies  تنصيب الارتباطات
```sh
  composer install
```
3.  App Settings in dotenv file  اعدادات التطبيق
```sh
  قم بنسخ ملف محتوى ملف .env.example
الى ملف جديد باسم env.
مع تغيير الإعدادات الخاصة بك من الاتصال بقواعد البيانات الخ
```
4. Migrate and seed Database انشاء جداول قواعد البيانات واضافة بيانات لتجربة البرنامج
```sh
  php artisan migrate:refresh --force --seed
```
5. تشغيل المشروع
```sh
  php artisan serve
```
## تم فتح هذا التشعب بواسطة

- [@fh32000](https://fb.com/fh32000).
- [@whatsapp: +967737060801](https://wa.me/+967737060801
).

## الغرض من هذا التشعب Fork

إجراء بعض التحسين على مستوى تنظيم الكود وتحسين جودة المخرجات وزيادة الكفاءة واستخدام أفضل الأساليب

سابقي هذا الفرع محدث بالأشياء الجديد من الفرع الاصلي من الاخوه
Samir-Gamal
و
John Doe

## ما الجديد في هذا التشعب Fork

### حل المشاكل
- حل مشكلة دعم بي اش بي 8 عن طريق سماح لمكتبة لارفيل يو أي بتحديث متوافق مع الاصدار الجديد
[ مرجع التعديل](https://github.com/fh32000/school-management-system/commit/798db7d49dffeac3c4c1cb7a33b57b588c39f272
)
- [ بسبب عدم حساسيته للاحرف](https://stackoverflow.com/questions/26560376/base-table-or-view-not-found-error-in-web-hosting-pdo-mysql
 )حل مشكة المايقريشن والسيد لا تعمل في سيرفر الينكس ولكن تعمل بشكل جيد في سيرفر المحلي 
- إصلاح مشكلة عدم التمكن من تنفيذ أمر الميجريشن ريفرش و الميجريشن رول باك
```sh
php artisan migrate:refresh --force --seed
or
php artisan migrate:rollback
```
[ مرجع التعديل](https://github.com/fh32000/school-management-system/commit/d6cec40ce2db6aa2ce3d67c1239dc7aa658cc4e7
)

### تعديلات

### إضافة مميزات جديدة
- امكانية عمل كاش لجميع الراوتر باستخدام الأمر التالي
```sh
     php artisan route:trans:cache
```

[ مرجع التعديل](https://github.com/fh32000/school-management-system/commit/69102432adcf0b6f526a7e8076d68839d7cc4875)

  [لماذا نحتاج عمل كاش الراوتر خصوصا في البرودكشن ؟](https://voltagead.com/laravel-route-caching-for-improved-performance/)

###  اتباع نظام Laravel Naming Conventions

###  اتباع أفضل التطبيقات Best Practices


###  تحسين تنظيمي واتباع نظام solid

### تحسين السرعة والأداء



## تعلم كيف تطور وتعدل على المشروع
يمكنك متابعة قناة الاستاذ على اليوتيوب
- [@youtube](https://www.youtube.com/watch?v=zKVIM-lnauo&list=PLftLUHfDSiZ7-RAsH8NskS7AYofykW_WN).

## الاقتراحات و التعاون

ارحب بكل الاقتراحات عن طريق فتح issues في المشروع وسيتم مناقشتها وجدولتها للعمل
كما أرحب بجميع المطورين لي حابين يضيفوا او يعدلوا أو يحذفوا بما يخدم المجتمع التعاوني ونخرج بمشروع مفتوح المصدر قوي ومحدث


##  الترخيص MIT

يدرج هذا المشروع ضمن رخصة مفتوح المصدر ضمن رخصة أم أي تي
حسب طرح الأستاذ Samir-Gamal للمشروع مفتوح المصدر على github

تعتبر رخصة ام اي تي رخصة متساهلة، بمعنى أنها تسمح باستخدامها مع البرمجيات الاحتكارية بشرط أن تكون الرخصة موزعة معها، وهي أيضاً متكاملة مع رخصة جنو العمومية، بمعنى أن رخصة جنو العمومية تسمح بجمعها ونشرها مع البرمجيات التي تستخدم رخصة أم أي تي.

[ كل شئ عن الترخيص مفتوح المصدر MIT](https://opensource.org/licenses/MIT).
</div>
