<?php
require_once($argv[1]); // type.php
require_once($argv[2]); // program.php
$file_prefix = $argv[3];
$idl_format = $argv[4];
?>
if (DEFINED DSN_CMAKE_INCLUDED)
else()
    set(DSN_ROOT "$ENV{DSN_ROOT}")
    if(NOT EXISTS "${DSN_ROOT}/")
        message(FATAL_ERROR "Please make sure that ${DSN_ROOT} exists.")
    endif()

    include("${DSN_ROOT}/bin/dsn.cmake")
endif()

set(MY_PROJ_NAME "<?=$_PROG->name?>")

# Source files under CURRENT project directory will be automatically included.
# You can manually set MY_PROJ_SRC to include source files under other directories.
set(MY_PROJ_SRC "")

# Search mode for source files under CURRENT project directory?
# "GLOB_RECURSE" for recursive search
# "GLOB" for non-recursive search
set(MY_SRC_SEARCH_MODE "GLOB_RECURSE")

set(MY_PROJ_INC_PATH "")

set(MY_PROJ_LIBS "")

set(MY_PROJ_LIB_PATH "")

set(INI_FILES "")
file(GLOB
    RES_FILES
    "${CMAKE_CURRENT_SOURCE_DIR}/*.ini"
    "${CMAKE_CURRENT_SOURCE_DIR}/*.sh"
    "${CMAKE_CURRENT_SOURCE_DIR}/*.cmd"
    "${CMAKE_CURRENT_SOURCE_DIR}/Dockerfile"
    )

# Extra files that will be installed
set(MY_BINPLACES ${RES_FILES})

set(MY_BOOST_PACKAGES "")

dsn_common_setup()
dsn_add_cs_executable()
