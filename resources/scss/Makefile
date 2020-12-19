# Code that written below is belong to Zain Alwan Wima Irfani. You may
# not use, share, modify, and study without the author's permission
# (zainalwan4@gmail.com).

CSS_OUTPUT = app.css
CSS_OUTPUT_DIR = ../../public/assets/css
CSS_OUTPUT_PATH = ${CSS_OUTPUT_DIR}/${CSS_OUTPUT}

all: css

css: app.scss
	@echo "Compiling CSS codes..."
	mkdir -p ${CSS_OUTPUT_DIR}
	sass -s compressed --update --watch app.scss ${CSS_OUTPUT_PATH}

clean:
	@echo "Removing compiled CSS..."
	rm -r -f ${CSS_OUTPUT_DIR}
