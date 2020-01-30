// Check if we're using staging URLs on the live site

(function stagingNotice() {
  if (window.location.hostname != 'specopssoft.com') return;

  let wasSavingPost = wp.data.select('core/editor').isSavingPost();
  let wasAutosavingPost = wp.data.select('core/editor').isAutosavingPost();
  let wasPreviewingPost = wp.data.select('core/editor').isPreviewingPost();

  // Determine whether to show notice
  wp.data.subscribe(() => {
    const isSavingPost = wp.data.select('core/editor').isSavingPost();
    const isAutosavingPost = wp.data.select('core/editor').isAutosavingPost();
    const isPreviewingPost = wp.data.select('core/editor').isPreviewingPost();
    const hasActiveMetaBoxes = wp.data.select('core/edit-post').hasMetaBoxes();
    const postContent = wp.data.select('core/editor').getEditedPostContent();
    const needToCheckContent = postContent.includes('wpengine.com');
    
    // Save metaboxes on save completion, except for autosaves that are not a post preview
    const shouldTriggerTemplateNotice = (
        (wasSavingPost && ! isSavingPost && ! wasAutosavingPost && needToCheckContent) ||
        (wasAutosavingPost && wasPreviewingPost && ! isPreviewingPost && needToCheckContent)
      );

    // Save current state for next inspection.
    wasSavingPost = isSavingPost;
    wasAutosavingPost = isAutosavingPost;
    wasPreviewingPost = isPreviewingPost;

    if ( shouldTriggerTemplateNotice ) {
      wp.data.dispatch('core/notices').createNotice(
        'warning', // Can be one of: success, info, warning, error
        'Warning: You may have staging data in your content! Please check your images and links.', // Text string to display
        {
          id: 'stagingnotice', //assigning an ID prevents the notice from being added repeatedly
          isDismissible: true, // Whether the user can dismiss the notice
          // Any actions the user can perform
          actions: []
        }
      );
    }
  });
})();