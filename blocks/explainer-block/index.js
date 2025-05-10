import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, MediaUpload, RichText } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button, ColorPicker } from '@wordpress/components';

registerBlockType('explainer-block', {
	edit: ({ attributes, setAttributes }) => {
		const { title, description, secondParagraph, imageUrl, imageAlt, backgroundColor, textColor } = attributes;

		const blockProps = useBlockProps();

		console.log('Block attributes:', attributes);
		return (
			<div {...blockProps}>
				<InspectorControls>
					<PanelBody
						title='Image Settings'
						initialOpen={true}
					>
						<MediaUpload
							onSelect={(media) => {
								setAttributes({
									imageUrl: media.url,
									imageAlt: media.alt || '',
								});
							}}
							allowedTypes={['image']}
							value={imageUrl}
							render={({ open }) => (
								<Button
									onClick={open}
									variant='secondary'
								>
									{!imageUrl ? 'Select Image' : 'Change Image'}
								</Button>
							)}
						/>
						{imageUrl && (
							<>
								<img
									src={imageUrl}
									alt={imageAlt}
									style={{ maxWidth: '100%', marginTop: '10px' }}
								/>
								<TextControl
									label='Alt Text'
									value={imageAlt}
									onChange={(value) => setAttributes({ imageAlt: value })}
								/>
							</>
						)}
					</PanelBody>

					<PanelBody
						title='Colors'
						initialOpen={false}
					>
						<div>
							<label>Background Color</label>
							<ColorPicker
								color={backgroundColor}
								onChangeComplete={(value) => setAttributes({ backgroundColor: value.hex })}
								disableAlpha
							/>
						</div>
						<div style={{ marginTop: '20px' }}>
							<label>Text Color</label>
							<ColorPicker
								color={textColor}
								onChangeComplete={(value) => setAttributes({ textColor: value.hex })}
								disableAlpha
							/>
						</div>
					</PanelBody>
				</InspectorControls>

				<div
					className='explainer-section-editor'
					style={{ backgroundColor, color: textColor, padding: '20px' }}
				>
					<div className='explainer-container'>
						<div className='explainer-image-wrapper'>
							{imageUrl ? (
								<img
									src={imageUrl}
									alt={imageAlt}
									className='explainer-image'
								/>
							) : (
								<div className='explainer-placeholder'>Click the block controls to add an image</div>
							)}
						</div>
						<div className='explainer-content'>
							<RichText
								tagName='h2'
								className='explainer-title'
								value={title}
								onChange={(content) => setAttributes({ title: content })}
								placeholder='Enter title...'
							/>
							<div className='explainer-description'>
								<RichText
									tagName='p'
									value={description}
									onChange={(content) => setAttributes({ description: content })}
									placeholder='Enter first paragraph...'
								/>
								<RichText
									tagName='p'
									value={secondParagraph}
									onChange={(content) => setAttributes({ secondParagraph: content })}
									placeholder='Enter second paragraph...'
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		);
	},
	save: () => {
		// Dynamic block - rendering is handled server-side
		return null;
	},
});
