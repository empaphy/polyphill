# Makephile configuration
# For more information, see https://makephile.empaphy.org
MAKEPHILE_VERSION = 1.x

.makephile/bootstrap.mk:
	curl --create-dirs --output $@ https://makephile.empaphy.org/bootstrap.mk
include .makephile/bootstrap.mk

ifdef MAKEPHILE_LIB
include $(MAKEPHILE_LIB)/usage.mk
endif
