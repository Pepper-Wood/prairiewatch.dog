def get_template(filename):
    """Returns a full file's contents as a Python dictionary.

    Args:
        filename (string): File name.

    Returns:
        dict: Dictionary representation of YAML structure.
    """
    with open(filename, 'r') as file:
        data = file.read()
    return data

def save_offender_to_file(slug, offender_template):
    file = open(f"data/offenders/{slug}.yml", 'w')
    file.write(offender_template)
    file.close()

if __name__ == "__main__":
    slug = input("Enter offender slug: ")
    offender_template = get_template("scripts/templates/offender_template.yml")
    offender_template = offender_template.replace("#SLUG#", slug)
    save_offender_to_file(slug, offender_template)
