module.exports = function ( grunt ) {
	const conf = grunt.file.readJSON( 'extension.json' );
	
	grunt.initConfig( );

    grunt.registerTask( 'test', [] );
	grunt.registerTask( 'default', 'test' );
};
