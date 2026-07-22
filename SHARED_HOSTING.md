# Shared Hosting တင်နည်း

1. Hosting PHP version ကို 8.3+ ပြောင်းပြီး MySQL database/user ဖန်တီးပါ။
2. Local/CI တွင် `composer install --no-dev --optimize-autoloader` လုပ်ထားသော project တစ်ခုလုံးကို domain root အပြင်ဘက် folder (ဥပမာ `~/msap`) သို့ upload လုပ်ပါ။
3. `public/` ထဲရှိဖိုင်အားလုံးကို `public_html/` သို့ကူးပြီး `public_html/index.php` ရှိ `../vendor/autoload.php` နှင့် `../bootstrap/app.php` path များကို `../msap/vendor/autoload.php`, `../msap/bootstrap/app.php` ဟုပြောင်းပါ။
4. `.env` တွင် production DB credentials, `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://...` သတ်မှတ်ပါ။ `APP_KEY` ကို local တွင် `php artisan key:generate --show` ဖြင့်ယူပါ။
5. `storage` နှင့် `bootstrap/cache` ကို writable permission ပေးပါ။ SSH ရှိပါက `php artisan storage:link` လုပ်ပါ။ မရှိပါက `public_html/storage` ကို `~/msap/storage/app/public` သို့ symlink ပြုလုပ်ရန် hosting panel သုံးပါ။ Symlink မရသော host တွင် public disk root ကို `public_html/storage` သို့ညွှန်ရန် hosting provider အကူအညီယူပါ။
6. Admin login ဝင်ပြီး Dashboard မှ Database Migrate ခလုတ်ကို တစ်ကြိမ်နှိပ်ပါ။ Seeder သည် migration endpoint တွင်မ run ပါ; SSH မရှိပါက admin user ကို DB panel မှထည့်ရန်ထက် deploy မတိုင်မီ database seed လုပ်ထားရန် အကြံပြုပါသည်။
7. Production cache: `php artisan config:cache && php artisan route:cache && php artisan view:cache`။

အရေးကြီး: default admin password ကို production မတင်မီ ပြောင်းပါ။ `public_html` အောက်တွင် `.env`, `vendor`, `storage/logs` မထားပါနှင့်။
