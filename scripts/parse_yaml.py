#!/usr/bin/env python
"""Parse all offender YAMLs and create requested generated JSON files."""

import json
import os
import yaml

class Offender:
    def __init__(self, filename):
        """Offender constructor, parses offender's yaml file for performing actions later.

        Args:
            filename (string): Offender file to parse, with path from root.
        """
        self.body = yaml_to_dict(filename)
        self.slug = self.body['slug']

    def get_social_media_listings(self, social_media):
        """Return a dictionary that maps social media handles to the offender's slug.

        Args:
            social_media (string): Social media name to query on, i.e. twitter.

        Returns:
            dict: Dictionary where key is social media handle string, value is the offender's slug.
        """
        result = {}
        # If provided social_media string is not a valid social_media key, return blank dict.
        if social_media not in self.body['social_media'].keys():
            return result
        handles = self.body['social_media'][social_media]
        for handle in handles:
            result[handle['handle']] = self.slug
        return result

    def get_websites(self):
        result = {}
        if "websites" not in self.body['social_media'].keys():
            return result
        for url in self.body['social_media']['websites']:
            result[url] = self.slug
        return result

    def get_counts(self):
        return len(self.body['counts'])
    
    def get_slug(self):
        return self.slug

    def get_name(self):
        return self.body['name']

def yaml_to_dict(filename):
    """Returns a full file's contents as a Python dictionary.

    Args:
        filename (string): File name.

    Returns:
        dict: Dictionary representation of YAML structure.
    """
    with open(filename, 'r') as file:
        data = file.read()
    return yaml.load(data, Loader=yaml.FullLoader)

def save_to_json_file(data, filename):
    """Saves a python dictionary as a JSON file.

    Args:
        data (dict): Python dictionary.
        filename (String): Resulting filename that will be appended with .json, i.e. 'toyhouse'.
    """
    filepath = f"{os.getcwd()}/data/{filename}.json"
    with open(filepath, 'w') as outfile:
        json.dump(data, outfile)

if __name__ == "__main__":
    '''
    Full main loop iterates over all offenders in data/offenders and assembles:
    - twitter.json
    - toyhouse.json
    - websites.json
    - stats.json
    '''
    offenders_path = f"{os.getcwd()}/data/offenders"

    files = os.listdir(offenders_path)

    twitters = {}
    toyhouses = {}
    websites = {}

    listing = {}

    stats = {
        "offenders": 0,
        "offenses": 0
    }
    for filename in files:
        # Load the offender in the helper class.
        offender_path = f"{offenders_path}/{filename}"
        offender = Offender(offender_path)

        # Combine the individual results from each offender with the complete lists.
        twitters = {**twitters, **offender.get_social_media_listings("twitter")}
        toyhouses = {**toyhouses, **offender.get_social_media_listings("toyhouse")}
        websites = {**websites, **offender.get_websites()}

        listing[offender.get_name()] = offender.get_slug()

        # Add to stats counters.
        stats["offenders"] += 1
        stats["offenses"] += offender.get_counts()

    # Save results to json files
    save_to_json_file(twitters, "twitter")
    save_to_json_file(toyhouses, "toyhouse")
    save_to_json_file(websites, "websites")
    save_to_json_file(listing, "listing")
    save_to_json_file(stats, "stats")
