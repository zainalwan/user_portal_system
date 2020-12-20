# Code that written below is belong to Zain Alwan Wima Irfani. You may
# not use, share, modify, and study without the author's permission
# (zainalwan4@gmail.com).

CSS_OUTPUT_DIR = ../../public/assets/css
APP_CSS_OUTPUT = app.css
APP_CSS_OUTPUT_PATH = ${CSS_OUTPUT_DIR}/${APP_CSS_OUTPUT}
EMAIL_CSS_OUTPUT = email.css
EMAIL_CSS_OUTPUT_PATH = ${CSS_OUTPUT_DIR}/${EMAIL_CSS_OUTPUT}

all: app

app: app.scss
	@echo "Compiling SCSS codes..."
	mkdir -p ${CSS_OUTPUT_DIR}
	sass -s compressed --update --watch app.scss ${APP_CSS_OUTPUT_PATH}

email: email.scss
	@echo "Compiling SCSS codes for email view..."
	mkdir -p ${CSS_OUTPUT_DIR}
	sass -s compressed --update --watch email.scss ${EMAIL_CSS_OUTPUT_PATH}

clean:
	@echo "Removing compiled CSS..."
	rm -r -f ${CSS_OUTPUT_DIR}
