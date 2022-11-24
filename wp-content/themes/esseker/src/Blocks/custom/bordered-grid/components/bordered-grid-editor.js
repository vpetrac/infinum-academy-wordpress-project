import React, { useMemo } from "react";
import {
  getUnique,
  outputCssVariables,
  props
} from "@eightshift/frontend-libs/scripts";
import manifest from "./../manifest.json";
import globalManifest from "./../../../manifest.json";
import { ParagraphEditor } from "../../../components/paragraph/components/paragraph-editor";
import { HeadingEditor } from "../../../components/heading/components/heading-editor";

export const BorderedGridEditor = ({ attributes, setAttributes }) => {
  
  const {
    blockClass,
    } = attributes;

  const unique = useMemo(() => getUnique(), []);


  return (
    <div className={blockClass} data-id={unique}>
      {outputCssVariables(attributes, manifest, unique, globalManifest)}
        <div className={`${blockClass}__item`}>
          <HeadingEditor
            {...props("firstHeading", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
          <ParagraphEditor
            {...props("firstParagraph", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
           </div>
          <div className={`${blockClass}__item`}>
          <HeadingEditor
            {...props("secondHeading", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
          <ParagraphEditor
            {...props("secondParagraph", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
           </div>
          <div className={`${blockClass}__item`}>
          <HeadingEditor
            {...props("thirdHeading", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
          <ParagraphEditor
            {...props("thirdParagraph", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
         </div>
          <div className={`${blockClass}__item`}>
          <HeadingEditor
            {...props("fourthHeading", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
          <ParagraphEditor
            {...props("fourthParagraph", attributes, {
              blockClass: blockClass,
              setAttributes,
            })}
          />
           </div>
          </div>
  );
};
