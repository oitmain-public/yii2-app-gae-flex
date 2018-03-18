# yii2-app-gae-flex
Create Yii2 basic application for deploy on Google App Engine (Flex Environment)

Flex Environment allows read and write on the directory `sys_get_temp_dir()`, which allows Yii2 to use the runtime folder

However, static assets are uploaded into Google Storage for public access

### Prerequisites
 * Create a Google Storage bucket with permission `Storage Object Viewer to allUsers`
 * Create a json key file for user <your-project>@appspot.gserviceaccount.com
 * Enable "Google App Engine Admin API"
 * Enable "Google App Engine Flexible Environment"
 * Enable "Cloud SQL API" on app engine project
 * Enable "Google Service Management API"
 * Enable cors on new storage bucket
```bash
$ echo '[{"origin": ["*"],"responseHeader": ["Content-Type"],"method": ["GET", "HEAD"],"maxAgeSeconds": 3600}]' > cors-config.json \
&& gsutil cors set cors-config.json gs://<your-bucket-name>
```

Instruction for advance branch : https://github.com/oitmain-public/yii2-app-gae-flex/blob/advanced/README.md

### Prerequisites
 * Create a Google Storage bucket with permission `Storage Object Viewer to allUsers`
 * Create a json key file for user <your-project>@appspot.gserviceaccount.com
 * Enable "Google App Engine Admin API"
 * Enable "Google App Engine Flexible Environment"
 * Enable "Cloud SQL API" on app engine project
 * Enable "Google Service Management API"
 * Enable cors on new storage bucket
```bash
$ echo '[{"origin": ["*"],"responseHeader": ["Content-Type"],"method": ["GET", "HEAD"],"maxAgeSeconds": 3600}]' > cors-config.json \
&& gsutil cors set cors-config.json gs://<your-bucket-name>
```

### Installalion

Clone project and install composer requirements

```bash
$ git clone https://github.com/oitmain-public/yii2-app-gae-flex
$ cd yii2-app-gae-flex
$ composer install
```

Copy and update configuration files

```bash
$ cp .env.dist .env
$ cp app.yaml.dist app.yaml
$ cp config/web-local.php.dist config/web-local.php
```

### Local Deployment
```bash
$ php -S localhost:8080 -t web/
```

### Deploy to Google App Engine

See https://cloud.google.com/appengine/docs/flexible/php/testing-and-deploying-your-app

```bash
$ gcloud app deploy —version [YOUR_VERSION_ID] —no-promote —project [YOUR_PROJECT_ID] 
```

### Google Cloud SQL
 * https://stackoverflow.com/questions/43964978/cannot-connect-to-google-cloudsql-from-app-engine
 * https://cloud.google.com/appengine/docs/flexible/php/using-cloud-sql
 * Enable Cloud SQL API on app engine project
 * Give Cloud SQL permission to app engine default service account email on Cloud SQL project

### Troubleshooting
 * A circular dependency is detected for bundle
   * This error occurs when asset bundle is called twice. Once for front view, and once for error view.
   * Use `app\models\PhpErrorHandler` to see the actual error without calling the error view
