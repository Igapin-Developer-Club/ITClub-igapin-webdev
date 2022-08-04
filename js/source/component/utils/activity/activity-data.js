import { deepMerge } from "../../../utils/core";

const updateActivityReactions = (activity, newReactions) => {
  const newActivity = deepMerge(activity);

  newActivity.reactions = newReactions;

  return newActivity;
};

const updateActivities = (activities, newActivityData) => {
  // activity data could be from a top level activity
  // or from an activity that is inside a top level activity
  const newActivities = activities.map((activity) => {
    // found activity to update data of
    if (activity.id === newActivityData.id) {
      return newActivityData;
    // there is media in the current top level activity
    } else if (activity.uploaded_media && (activity.uploaded_media.data.length > 0)) {
      const newActivityUploadedMedia = activity.uploaded_media.data.map((uploadedMediaActivity) => {
        // found media activity to update data of
        if (uploadedMediaActivity.id === newActivityData.id) {
          return newActivityData;
        }

        return uploadedMediaActivity;
      });

      activity.uploaded_media.data = newActivityUploadedMedia;
    }

    return activity;
  });

  return newActivities;
};

export {
  updateActivityReactions,
  updateActivities
};