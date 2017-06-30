install-option-tree:
	rm -rf option-tree
	git clone --depth=1 --branch=master https://github.com/valendesigns/option-tree.git

build:
	make install-option-tree

.PHONY: build install-option-tree
