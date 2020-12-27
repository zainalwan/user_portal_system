# Code that written below is belong to Zain Alwan Wima Irfani. You may
# not use, share, modify, and study without the author's permission
# (zainalwan4@gmail.com).

JS_OUTPUT = script.js
JS_OUTPUT_DIR = ../../public/assets/js
JS_OUTPUT_PATH = ${JS_OUTPUT_DIR}/${JS_OUTPUT}

all: js

js: PasswordField.js App.js script.js
	@echo "Compiling JavaScript codes..."
	mkdir -p ${JS_OUTPUT_DIR}
	touch ${JS_OUTPUT_PATH}
	cat PasswordField.js > ${JS_OUTPUT_PATH}
	cat App.js >> ${JS_OUTPUT_PATH}
	cat script.js >> ${JS_OUTPUT_PATH}
	@echo "JavaScript codes was SUCCESSFULLY compiled."

clean:
	@echo "Removing compiled CSS..."
	rm -r -f ${JS_OUTPUT_DIR}
