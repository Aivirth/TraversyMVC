const gulp = require('gulp');
const sass = require('gulp-sass');

//Compile sass & inject into browser
gulp.task('sass', ()=>{
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'public/scss/*.scss'])
        .pipe(sass())
        .pipe(gulp.dest('public/css'));
});

//Move JS file to public/js
gulp.task('js', ()=>{
    return gulp.src([
        'node_modules/bootstrap/dist/js/bootstrap.min.js', 
        'node_modules/jquery/dist/jquery.min.js', 
        'node_modules/popper.js/dist/umd/popper.min.js'])
        .pipe(gulp.dest('public/js'));

});

//Watch sass and serve 
gulp.task('serve', ['sass'], ()=>{
    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'public/scss/*.scss'], ['sass']);
});

//Move fonts to public/fonts
gulp.task('fonts', ()=>{
    return gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest("public/fonts"));
});

//Move fontawesome to public/css
gulp.task('fa', ()=>{
    return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
        .pipe(gulp.dest("public/css"));
});

gulp.task('default', ['js', 'serve', 'fa', 'fonts',]);