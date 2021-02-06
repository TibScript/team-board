# Release

## <a name="add_a_tag">Tag </a>

* To tag the new version, go to the root of the repository, and launch `git tag x.y.z`.
* Go on `package.json` and change `version` value (need to be at least a patch or an `alpha` more than the last tag).

`x.y.z` follow [semvert convention][tag_rule].

## Changelog

* Go to the commit that you estimate that is stable.
* [Add a tag][add_a_tag]
* Generate the changelog: go to the root of the repository, and launch `npm run changelog`.
  * The changelog is based on commit and tag with semver format (or with a `v`)

[add_a_tag]: #add_a_tag
[tag_rule]: ../../CONTRIBUTING.md#branch_and_tag
