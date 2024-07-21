( function ( blocks, element, serverSideRender, blockEditor ) {
    var el = element.createElement,
        registerBlockType = blocks.registerBlockType,
        ServerSideRender = serverSideRender,
        useBlockProps = blockEditor.useBlockProps;

    registerBlockType( 'dsfr/site-logo', {

        edit: function ( props ) {
            var blockProps = useBlockProps();
            return el(
                'div',
                blockProps,
                el( ServerSideRender, {
                    block: 'dsfr/site-logo',
                    attributes: props.attributes,
                } ),

            );
        },

		save: () => null
    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.serverSideRender,
    window.wp.blockEditor
);